@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="card">
        <div class="card-header">
            Dashboard
        </div><br>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="background-color:#001a33;">
                                    <div class="card-body d-flex">
                                        <div>
                                            <div class="info-box" style="color: white">
                                                <strong class="" style=" font-size: 20px;">{{$bill}}</strong>
                                            </div>

                                            <div class="info-box" style="color: white">
                                                <strong class="" style=" font-size:20px;">Bills</strong>
                                            </div>
                                        </div>

                                    </div><!-- /.info-box -->
                                </div>
                            </div>
                            <div class="col-md-3">
                             <div class="card" style="background-color:#001a33">
                                <div class="card-body d-flex">
                                    <div>
                                        <div class="info-box" style="color: white">
                                            <strong class="" style=" font-size:20px;">{{$completed_order}}</strong>
                                        </div>

                                        <div class="info-box " style="color: white">
                                            <strong class="" style=" font-size:20px;">Completing Order</strong><br>

                                        </div>
                                    </div>

                                </div><!-- /.info-box -->
                             </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background-color:#001a33">
                                    <div class="card-body d-flex">
                                        <div>
                                            <div class="info-box " style="color: white">
                                                <strong class="" style=" font-size: 20px;">{{$open_order}}</strong>
                                            </div>

                                            <div class="info-box" style="color: white">
                                                <strong class="" style=" font-size:20px;">Open Order</strong><br>

                                            </div>
                                        </div>

                                    </div><!-- /.info-box -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="background-color:#001a33">
                                    <div class="card-body d-flex">
                                            <div>
                                                <div class="info-box" style="color: white">
                                                    <strong class="" style=" font-size: 20px;">{{$allorder}}</strong>
                                                </div>

                                                <div class="info-box" style="color: white">
                                                    <strong class="" style=" font-size:20px;"> Total Orders</strong>
                                                </div>
                                            </div>
                                    </div><!-- /.info-box -->
                                </div>
                            </div>
                     </div>
                    </div>
                </div>
                <div class="row">


                    <div class="col-12 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                       <div class="card">
                           <div class="card-body">
                            <div id="chartContainer" style="height: 300px; width: 100%;">
                            </div>
                            <select id="ordervalues" hidden>
                                @foreach ($chartDatas as $key => $item)
                                <option value="{{$key}}" hidden >{{$item}}</option>
                                @endforeach
                            </select>
                           </div>
                       </div>
                  </div>
                    <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="monthchartContainer" style="height: 300px; width: 100%;">
                                </div>
                                <select id="monthordervalues" hidden>
                                    @foreach ($lastmonth as $key => $items)
                                    <option value="{{$key}}" hidden>{{$items}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="card-body">
                        <div id="clientchartContainer" style="height: 300px; width: 100%;">
                        </div>
                        <select id="clientordervalues" hidden>
                            @foreach ($clientmonth as $key => $items)
                            <option value="{{$key}}" hidden>{{$items}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <div class="card-body">
                        <div id="providerchartContainer" style="height: 300px; width: 100%;">
                        </div>
                        <select id="providerordervalues" hidden>
                            @foreach ($providertmonth as $key => $items)
                            <option value="{{$key}}" hidden>{{$items}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
       <div class="row">
            <div class="col-md-6">
                <div class="card ml-5">
                    <div class="card-header">
                        <strong>Monthly Customer</strong>
                    </div>
                    <div class="card-body">
                        <strong>{{$client_orders}}</strong>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mr-5">
                    <div class="card-header">
                        <strong>Monthly Provider</strong>
                    </div>
                    <div class="card-body">
                        <strong class="ml-2">{{$provider_orders}}</strong>
                    </div>
                </div>
            </div>
       </div>

       <br>
     <div class="row">
         <div class="col-md-6">
             <div class="card">
                 <div class="card-header">
                     <strong>Latest Five Date Record</strong>
                 </div>
                 <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <tr>
                                <th scope="col">Order Cost</th>
                                <th scope="col">Order Fee</th>
                                <th scope="col">Number Of Orders</th>
                                <th scope="lastth">Date</th>
                              </tr>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $key=>$item)

                                <tr>
                                    <td>{{$item["total_cost"]}}</td>
                                    <td>{{$item["order_fee"]}}</td>
                                    <td>{{count($item["order"])}}</td>
                                    <td>{{$key}}</td>
                                </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
             </div>
         </div>
         <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Latest Five Record Of Day</strong>
                    </div>
                <div class="card-body">
                   <table class="table table-bordered table-hover">
                       <thead>
                         <tr>
                           <tr>
                               <th scope="col">Order Cost</th>
                               <th scope="col">Number of Services</th>
                               <th scope="col">Service Provider</th>
                               <th scope="lastth">Client</th>
                             </tr>
                         </tr>
                       </thead>
                       <tbody>
                           @foreach ($client_provider as $value)
                            <tr>
                                <td>{{$value->total_cost}}</td>
                                <td>{{$value->services}}</td>
                                <td>{{$value->provider->name}}</td>
                                <td>{{$value->userdetail->name}}</td>
                            </tr>
                            @endforeach
                       </tbody>
                     </table>
                   </div>
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong> Latest Five Year  Record</strong>
                </div>
                <div class="card-body">
                   <table class="table table-bordered table-hover">
                       <thead>
                         <tr>
                           <tr>
                               <th scope="col">Order Cost</th>
                               <th scope="col">Order Fee</th>
                               <th scope="col">Number Of Orders</th>
                               <th scope="lastth">Year</th>
                             </tr>
                         </tr>
                       </thead>
                       <tbody>
                         @foreach ($yearorders as $key=>$value )
                           <tr>
                               <td>{{$value['yeartotalcost']+=count($value["order"])*$value["order_fee"]}}</td>
                               <td>{{$value["order_fee"]}}</td>
                               <td>{{count($value["order"])}}</td>
                               <td>{{$key}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
           <div class="card">
            <div class="card-header">
                <strong>Latest Five Month Record</strong>
            </div>
               <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <tr>
                            <th scope="col">Order Cost</th>
                            <th scope="col">Order Fee</th>
                            <th scope="col">Number Of Orders</th>
                            <th scope="lastth">Month</th>
                          </tr>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($monthorders as $key=>$value)
                        <tr>
                                <td></td>
                               <td>{{$value['monthtotalcost']+=count($value["order"])*$value["order_fee"]}}</td>
                               <td>{{count($value["order"])}}</td>
                               <td>{{$key}}</td>
                         </tr>
                         @endforeach
                     </tbody>
               </table>
              </div>
           </div>
       </div>
    </div><br><br>
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card " id="cuar_reply_0">
                    <div class="card-header">
                        <strong>Custom Order Record</strong>

                    </div>
                    <div class="card-body" id="scroll">
                        <div>
                            <form method="get" action="{{route('admin.home')}}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4 d-flex">

                                        <div class="form-group"> <!-- Date input -->
                                        <label class="control-label" for="date">From Date</label>
                                        <input class="form-control" id="date" name="from_date"   type="date" value="{{$from_date}}" selected="selected"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex">
                                        <div class="form-group "> <!-- Date input -->

                                        <label class="control-label" for="date">To Date</label>
                                        <input class="form-control" id="date" name="to_date" placeholder="MM/DD/YYY" type="date" value="{{$to_date}}" selected/>
                                        </div>
                                    </div>

                                    <div class="form-group"> <!-- Submit button -->
                                        <button class="btn btn-info mt-4"  style="background-color:#001a33 " name="submit" type="submit" >Submit</button>
                                    </div>
                                </div>
                          </form>
                        </div>
                       <table class="table table-bordered table-hover">
                           <thead>
                             <tr>
                               <tr>
                                   <th scope="col">Order Cost</th>
                                   <th scope="col">Number of Services</th>
                                   <th scope="col">Service Provider</th>
                                   <th scope="lastth">Client</th>
                                 </tr>
                             </tr>
                           </thead>
                           <tbody>
                               @foreach ($custom as $value)
                               <tr>
                                   <td>{{$value->total_cost}}</td>
                                   <td>{{$value->services}}</td>
                                   <td>{{$value->provider->name}}</td>
                                   <td >{{$value->userdetail->name}}</td>
                               </tr>

                               @endforeach
                            </tbody>
                      </table>
                    </div>
                </div>
            </div>

        </div>
    </section>


  </div>
</div>

@endsection
@section('scripts')
@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
$(window).load(function() {
  $("section, table").animate({
    scrollTop: $('#cuar_reply_0').offset().top
  }, 1000);
});
</script>
<script>
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
console.log(d);
document.getElementById("date").innerHTML = m + " ." + d + " ." + y;
</script>
@endsection

<style>
table.table tbody tr td,
table.table thead tr th,
table.table thead {
border-right: 1px solid;
border-top: 0.5px;
}

</style>

