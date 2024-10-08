  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Script JS -->
     <script src="js/script.js"></script>


     <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          // ['Clicks',    <?php //echo $session->count;?>],
          ['Comments',    <?php echo Comment::count_all();?>],
          ['Users',     <?php echo User::count_all();?>],
          ['Photos',    <?php echo Photo::count_all();?>]
        ]);

        var options = {
          // pieSliceText: 'label',
          backgroundColor: 'transparent',
          title: 'Photo Gallery Data'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>



</body>

</html>
