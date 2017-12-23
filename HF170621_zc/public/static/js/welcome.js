/**
 * Created by Administrator on 2017/12/22.
 */
//后台获取个人信息
console.log(welcome_ajax);
$.ajax({
    type:'post',
    url:welcome_ajax,
    dataType:'json',
    data:'',
    success:function(res){
        switch(res.code)
        {
            case 1001:
                $('#my_ename').html(res.data.ename);
                $('#my_eid').html(res.data.eid);
                $('#my_cha').html(res.data.cha_name);
                break;
            case 1002:
                alert(res.msg);
                break;
        }
    }
});
