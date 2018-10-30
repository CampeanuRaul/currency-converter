<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Currency;

use Orchestra\Parser\Xml\Facade as XmlParser;

use ConsoleTVs\Charts\Charts;

use DB;

use Lava;



class PageController extends Controller
{
   
    public function index()
    {

    	$data = Currency::all();
    	$date = DB::table('currency')->distinct()->get(['data']);

        return view('pages.index')->withData($data)->withDate($date);
    }

  
    public function setData(Request $request)
    {
        $this->validate($request, [
        	'data' => 'required'
        ]);



        $getOptions = DB::table('currency')->where('data', '=', $request->data)->get();
        $dt = $request->data;

        $dt = $request->data;
        return view('convert.result')->withOptions($getOptions)->withDt($dt);
    }


    public function convert(Request $request)
    {
        $this->validate($request, [
        	'value' => 'required|integer',
        	'currency1' => 'required',
        	'currency2' => 'required'     	
        ]);

       $dt = $request->dt;

       $moneda1 = DB::table('currency')->where('data', '=', $request->dt)->where('valoare', '=', $request->currency1)->get();
       $moneda2 = DB::table('currency')->where('data', '=', $request->dt)->where('valoare', '=', $request->currency2)->get();

       $val1 = $request->currency1;
       $val2 = $request->currency2;


 	   $getOptions = DB::table('currency')->where('data', '=', $dt)->get();

       $data =  DB::table('currency')->where('data', '=', $request->dt)->where('valoare', '=', $request->currency1)->orWhere(function ($query) {
       			global $request;
        		$query->where('valoare', $request->currency2);
        })->get();
       
       $result = $request->value * ( $request->currency1 / $request->currency2);

       return view('convert.result')->withData($data)->withDt($dt)->withResult($result)->withOptions($getOptions)->withVal1($val1)->withVal2($val2)->withMoneda1($moneda1)->withMoneda2($moneda2);
    }

    public function chart() {
    	
      $date = DB::table('currency')->distinct()->get(['data']);
      $euro = DB::table('currency')->where('moneda', '=', 'EUR')->get(['valoare']);


      // dd($euro);
      $dateArr = [];
      $euroArr = [];
      $i = 0;
      foreach($date as $d) {
          $dateArr[$i++] = $d->data;
      }

      foreach($euro as $e) {
        $euroArr[$i++] = $e->valoare;
      } 

      $chart = Charts::create('line', 'highcharts')
            ->setTitle('Title')
            ->setLabels($dateArr)
            ->setValues($euroArr);

      
      
      return view('pages.show', compact('chart'))->withData($euro);
    }


}
