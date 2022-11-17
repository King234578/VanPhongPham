@extends('admin.main')

@section('content')

<div id="profit"></div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('[name=csrf-token]').attr('content')
        }
    });
   var chart= new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'profit',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.

  // The name of the data record attribute that contains x-values.
  xkey: 'date',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['sales'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['profit']
});
taixongthongke();

            function taixongthongke(){
                $.ajax({
                    url:"http://127.0.0.1:8000/admin",
                    method:"POST",
                    dataType:"JSON",
                    data:{},
                    success:function(data) {
                        chart.setData(data);
                    }
                });
            }
</script>
@endsection
