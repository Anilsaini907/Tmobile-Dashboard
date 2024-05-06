
   
    // console.log('index');
    var apiUrl = "http://localhost/demo/rest_api";
    function bindChartDataName(jsonData) {
      jsonData.forEach(function(item) {
        item.y = Number(item.y);
      });
      var chart = Highcharts.chart('chartContainer', {
        chart: {
          type: 'column'
        },
        // credits:{
        //   enabled:false,
        // },
        title: {
          text: ''
        },
        xAxis: {
          type: 'category',
          labels: {
            rotation: -45,
            style: {
              fontSize: '13px',
              fontFamily: 'Verdana, sans-serif'
            }
          }
        },
        yAxis: {
          title: {
            text: 'Total Usage'
          }
        },
        series: [{
          name: 'Total Usage',
          colorByPoint: true,
          data: jsonData

        }]
      });

    }

    function bindChartDataByDate(jsonData) {
      jsonData.forEach(function(item) {
        item.y = Number(item.y);
      });
      var data = jsonData;
      var groupedData = {};
      data.forEach(function(item) {
        var date = item.date;
        if (!groupedData[date]) {
          groupedData[date] = 0;
        }
        groupedData[date] += item.y;
      });
      // Prepare data for Highcharts
      var chartData = [];
      Object.keys(groupedData).forEach(function(date) {
        chartData.push({
          name: date,
          y: groupedData[date]
        });
      });
      //  console.log("chartData",chartData);
      // Configure Highcharts chart
      Highcharts.chart('chartContainer1', {
        chart: {
          type: 'column'
        },
        credits:{
          enabled:false,
        },
        title: {
          text: ''
        },
        xAxis: {
          categories: Object.keys(groupedData) // Dates
        },
        yAxis: {
          title: {
            text: 'Usage Value'
          }
        },
        series: [{
          name: 'Usage By Date',
          data: chartData // Usage values
        }]
      });
    }

    function bindTableByNameAndDate(jsonDate) {
      // console.log("table function",jsonDate);
      var data = jsonDate;
      var dataTable = $('#dataTable').DataTable({
        data: data,
        "bDestroy": true,
        columns: [{
            data: 'date'
          },
          {
            data: 'techNames'
          },
          {
            data: 'totalUsage'
          }
        ]
      });

      dataTable.clear().draw();
      dataTable.rows.add(jsonDate).draw();
    }

    function ajaxCall(startDate, endDate) {
      $.ajax({
        url: `${apiUrl}/kpi_data.php?p_DataRequest=TechUsage_ByName&p_startDate=${startDate}&p_endDate=${endDate}`, // PHP file to send the request
        type: 'GET',
        success: function(res) {
          bindChartDataName(res.data);
        },
        error: function(xhr, status, error) {
          console.error(error); // Log any errors to the console
        }
      });
      $.ajax({
        url: `${apiUrl}/kpi_data.php?p_DataRequest=TechUsage_ByDate&p_startDate=${startDate}&p_endDate=${endDate}`, // PHP file to send the request
        type: 'GET',
        success: function(res) {

          bindChartDataByDate(res.data);
        },
        error: function(xhr, status, error) {
          console.error(error); // Log any errors to the console
        }
      });

      $.ajax({
        url: `${apiUrl}/kpi_data.php?p_DataRequest=TechUsage_ByNameAndDate&p_startDate=${startDate}&p_endDate=${endDate}`, // PHP file to send the request
        type: 'GET',
        success: function(res) {
          // console.log("table",res.data);
          bindTableByNameAndDate(res.data);
        },
        error: function(xhr, status, error) {
          console.error(error); // Log any errors to the console
        }
      });
    }

    $(document).ready(function() {      

      const today = moment();
     const todaydate=today.format('YYYY-MM-DD');
     const sevendaysbefore=moment().subtract(7, "days").format("YYYY-MM-DD");
  
      var startDate = todaydate;
      var endDate = sevendaysbefore;
      $('#startDate,#endDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      });
      $("#startDate").datepicker("setDate", startDate);
      $("#endDate").datepicker("setDate", endDate);
      $('#filterForm').submit(function(event) {
        event.preventDefault();
        var startFromDate = $('#startDate').val();
        var endToDate = $('#endDate').val();
        ajaxCall(startFromDate, endToDate);
      });

      $('#resetForm').click(function(event) {
        $("#startDate").datepicker("setDate", startDate);
        $("#endDate").datepicker("setDate", endDate);
        ajaxCall(startDate, endDate);
      });
      // console.log(startOfWeek, endOfWeek);
      ajaxCall(startDate, endDate);
    })

    function logout(){
      let userName = sessionStorage.getItem("IS_VALID");
      console.log(userName);
      sessionStorage.clear();
      window.location.href = "login.php";
    }
  
