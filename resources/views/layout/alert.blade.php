@if(Session::has('success'))
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Thành công!</h4>
        {{ Session::get('success') }}
    </div>
@elseif (Session::has('error'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Thất bại!</h4>
        {{ Session::get('error') }}
    </div>
@endif
<script>
    $(".alert-dismissable").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert-dismissable").slideUp(500);
    });
</script>
