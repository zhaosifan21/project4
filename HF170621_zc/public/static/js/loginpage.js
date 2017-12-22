/**
 * Created by Administrator on 2017/12/22.
 */
//登录
$('#submit').bind('click',function(){
    var eid = $('#eid').val();
    var pwd = $('#pwd').val();
    var code = $('#code').val();
    $.ajax({
        type:'post',
        url:login_ajax,
        data:'eid='+eid+'&pwd='+pwd+'&code='+code,
        success:function(res){
            if(res.code==1){
                alert(res.msg);
                location.href = res.data.url;
            }
            else if(res.code==3){
                alert(res.msg);
                refreshCode($('#t_code')[0]);
            }
            else{
                alert(res.msg);
                refreshCode($('#t_code')[0]);
            }
        }
    });
});