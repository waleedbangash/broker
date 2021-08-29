window.onload = function () {
    var chartValues = [];
    var x = document.getElementById("ordervalues");


    var i;

    for (i = 0; i < x.length; i++) {
        var xaxis = x.options[i].value;  // get date

        var splitter = xaxis.split("-"); // get array of date

        var y =parseInt(x.options[i].innerHTML); // get 1

       chartValues.push({x: new Date(splitter[0],splitter[1]-1,splitter[2]),y:y});

    }
    var dailychart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "Daily Orders"
    },
    axisX:{
        title: "Date",

    },
    axisY: {
        title: "Orders",
        gridThickness: 0,
    },
    data: [
    {
        type: "line",

        dataPoints:chartValues,

    }
    ]
});
dailychart.render();
//last month
var month_chartValues = [];
var x = document.getElementById("monthordervalues");

var i;

for (i = 0; i < x.length; i++) {
    var xaxis = x.options[i].value;  // get date

    var splitter = xaxis.split("-"); // get array of date
    var y =parseInt(x.options[i].innerHTML); // get 1
     month_chartValues.push({x:new Date(splitter[0],splitter[1]-1),y:y});

}
var monthchart = new CanvasJS.Chart("monthchartContainer",
{
  title:{
    text: "Last 5 Month Orders"
},
axisX:{
    title: "Month",

},
axisY: {
    title: "Orders",
    gridThickness: 0,
},
data: [
{
    type: "line",

    dataPoints:month_chartValues,

}
]
});
monthchart.render();
//clientmonth chart
var client_chartValues = [];
var x = document.getElementById("clientordervalues");


var i;

for (i = 0; i < x.length; i++) {
    var xaxis = x.options[i].value;  // get date

    var splitter = xaxis.split("-"); // get array of date

    var y =parseInt(x.options[i].innerHTML); // get 1

   client_chartValues.push({x: new Date(splitter[0],splitter[1]-1),y:y});

}
var clientchart = new CanvasJS.Chart("clientchartContainer",

{

  title:{
    text: "Customers"
},
axisX:{
    title: "Month",

},
axisY: {
    title: "Clients",
    gridThickness: 0,
},
data: [
{
    type: "line",

    dataPoints:client_chartValues,

}
]
});
clientchart.render();
//providermonth chart
var provider_chartValues = [];
var x = document.getElementById("providerordervalues");


var i;

for (i = 0; i < x.length; i++) {
    var xaxis = x.options[i].value;  // get date

    var splitter = xaxis.split("-"); // get array of date

    var y =parseInt(x.options[i].innerHTML); // get 1

   provider_chartValues.push({x: new Date(splitter[0],splitter[1]-1),y:y});

}
var providerchart = new CanvasJS.Chart("providerchartContainer",

{

  title:{
    text: "Providers"
},
axisX:{
    title: "Month",

},
axisY: {
    title: "Providers",
    gridThickness: 0,
},
data: [
{
    type: "line",

    dataPoints:provider_chartValues,

}
]
});

    providerchart.render();
}



