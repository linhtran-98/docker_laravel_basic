<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/template/admin/dist/js/adminlte.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
    $('#search').on('keyup',function(){
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('search') }}',
            data: {
                'search': $value
            },
            success:function(data){
                $('#livesearch').html(data);
            }
        });
    })
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>