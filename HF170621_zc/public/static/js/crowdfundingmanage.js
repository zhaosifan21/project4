/**
 * Created by Administrator on 2017/12/23.
 */
var vueobj = new Vue();//用于连接两个组件

//显示众筹列表的组件
Vue.component('crowdfundingtable',{
    template:'<div class="mt-20" v-cloak>\
    <table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">\
        <thead>\
            <tr class="text-c">\
            <th width="80">ID</th>\
            <th>名称</th>\
            <th width="80">分类</th>\
            <th width="80">发起者</th>\
            <th width="130">提交时间</th>\
            <th width="75">总金额</th>\
            <th width="60">发布状态</th>\
            <th width="120">操作</th>\
            </tr>\
        </thead>\
        <tbody>\
            <tr class="text-c" v-for="item in crowdfunding_list">\
            <td>{{item.cid}}</td>\
            <td class="text-l">{{item.cname}}</td>\
            <td>{{item.ctype_name}}</td>\
            <td>{{item.uname}}</td>\
            <td>{{item.applytime}}</td>\
            <td>{{item.cmoney}}</td>\
            <td>{{item.cstate_name}}</td>\
            <td><span v-on:click="check_this(item.cid)" style="color:blue;cursor:pointer">审核</span></td>\
            </tr>\
        </tbody>\
    </table>\
</div>',
    data:function(){
        return {
            crowdfunding_list:[],
            flag:1, //标志位，默认为全部众筹
            nowpage:1,
            pageAll:1,
            url:get_crowdfunding_ajax,
            show:true
        };
    },
    created:function(){
        this.showAllCrowdfunding(this.url,this.nowpage);

        //上一页
        vueobj.$on('prevpage',()=>{
            if(parseInt(this.nowpage)==1){
                alert('已经是第一页了');
            }
            else{
                var prevpage = parseInt(this.nowpage)-1;
                this.showAllCrowdfunding(this.url,prevpage);
                vueobj.$emit('pagechange',prevpage);
            }
        });

        //下一页
        vueobj.$on('nextpage',()=>{
            if(parseInt(this.nowpage)==parseInt(this.pageAll)){
                alert('已经是最后一页了');
            }
            else{
                var nextpage = parseInt(this.nowpage)+1;
                this.showAllCrowdfunding(this.url,nextpage);
                vueobj.$emit('pagechange',nextpage);
            }
        });
        vueobj.$on('pageto',()=>{
            var page = parseInt($('#pageinput').val());
            if(isNaN(page)){
                alert('输入不合法');
            }
            else if(page>this.pageAll){
                this.showAllCrowdfunding(this.url,this.pageAll);
            }
            else if(page<1){
                this.showAllCrowdfunding(this.url,1);
            }
            else{
                this.showAllCrowdfunding(this.url,page);
            }
            vueobj.$emit('pagechange',page);
        })
    },
    methods:{
        //全部众筹列表分页
        showAllCrowdfunding:function(url,nowpage){
            var _this = this;
            $.ajax({
                type:'post',
                data:'',
                url:url+'?nowpage='+nowpage,
                dataType:'json',
                success:function(res) {
                    switch(res.code)
                    {
                        case 1001:
                            var data = res.data;
                            console.log(data);
                            _this.pageAll = data.pageAll;
                            _this.nowpage = data.nowpage;
                            _this.crowdfunding_list = data.data;
                            vueobj.$emit('sendpageAll', _this.pageAll);
                            break;
                        case 1002:
                            alert(res.msg);//获取数据失败
                            break;
                    }
                }
            });
        },
        //审核列表中的某众筹
        check_this:function(cid){
            console.log(cid);
        }
    }
});

//分页组件
Vue.component('crowdfundingpage',{
    template:'<div style="width:100%;margin-top:20px">\
            <div>\
                <button type="button" class="btn0" v-on:click="prevpage" style="margin-left:0">上一页</button>\
                <button type="button" class="btn0" v-on:click="nextpage">下一页</button>\
            </div>\
            <div style="line-height:34px;float:left;margin-left:15px">\
                <span>当前为{{nowpage}}页，一共有{{pageAll}}页</span>\
            </div>\
            <div style="float:left">\
                <input type="number" style="margin-left:15px" class="form-control" id="pageinput" :value="nowpage">\
            </div>\
            <div>\
                <button type="button" class="btn0" style="margin-left:15px;height:34px;float:left" v-on:click="pageto()">跳转</button>\
            </div>\
     </div>',
    data:function(){
        return {
            nowpage:1,
            pageAll:1
        };
    },
    created:function(){
        vueobj.$on('pagechange',(page)=>{
            this.nowpage=page;
        });
        vueobj.$on('sendpageAll',(page)=>{
            this.pageAll=page;
        });
    },
    methods:{
        prevpage:function(){
            vueobj.$emit('prevpage');
        },
        nextpage:function(){
            vueobj.$emit('nextpage');
        },
        pageto:function(){
            vueobj.$emit('pageto');
        }
    }
});
var vue_all = new Vue({
    el:'#content'
});