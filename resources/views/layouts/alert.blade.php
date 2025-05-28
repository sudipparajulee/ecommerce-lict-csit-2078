@if(Session::has('success'))
<div id="alert" class="fixed top-4 right-4 z-50 p-2 bg-green-600 text-white">
    {{session('success')}}
</div>
<style>
    #alert {
        margin-right: -100%;
        transition: margin-right 1s ease-in-out;
    }
</style>
<script>
    setTimeout(function() {
        document.getElementById('alert').style.marginRight = '0';
        document.getElementById('alert').style.transition = '1s ease-in-out';
    },100);
    setTimeout(function() {
        document.getElementById('alert').style.marginRight = '-100%';
        document.getElementById('alert').style.transition = '1s ease-in-out';
    }, 3000);
</script>
@endif
