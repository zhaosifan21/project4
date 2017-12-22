/**
 * Created by Administrator on 2017/12/22.
 */

var menu_vue = new Vue({
    el:'#showmenu',
    data:{
        'mypermission':[]
    },
    created:function(){
        this.init();
    },
    methods:{
        init:function(){
            this.mypermission = [
                {mid:1,mname:'系统管理',fid:0,url:'#',smenu:[
                    {mid:2,mname:'员工管理',fid:1,url:'membermanage.html'},
                    {mid:3,mname:'权限管理',fid:1,url:'permissionmanage.html'},
                    {mid:4,mname:'前台用户管理',fid:1,url:'usermanage.html'}
                ]},
                {mid:5,mname:'众筹管理',fid:0,url:'#',smenu:[
                    {mid:6,mname:'众筹查询审核',fid:5,url:'crowdfundingmanage.html'},
                    {mid:7,mname:'限时抢购发布',fid:5,url:'loginpage.html'}
                ]}
            ]
        }
    }
});

//退出后台系统（注销登录）
$('#logout').bind('click',function(){
    $.ajax({
        type:'post',
        url:logout_ajax,
        data:'',
        dataType:'json',
        success:function(res){
            switch(res.code)
            {
                case 1001:
                    alert(res.msg);
                    location.href = res.data.url;
                    break;
            }
        }
    });
});