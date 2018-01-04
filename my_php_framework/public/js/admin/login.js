/**
 * 前端登录业务类
 * @author JOE
 */

/**
var login = {
    check:function () {
        //获取登录页面的用户名密码
        var username = $('input[name="username"]').val();
        alert(username);
    }
}
 */

layui.use('form', function(){
    var form = layui.form;
    //监听提交
    form.on('submit(formDemo)', function(data){
        params = data.field;
        submit($,params);
        return false;
        //layer.msg(JSON.stringify(data.field['username']));
       /* var username = JSON.stringify(data.field['userename']);
        var password = JSON.stringify(data.field['password']);
        var url = "/admin/check";
        var data = {'username':username,'password':password};*/
    });
});
function submit($,params){
    var username = params['username'];
    var password = params['password'];
    var url = "/admin/check";
    var data = {'username':username,'password':password};
    //执行异步请求 $.post
    $.post(url,data,function(result){
        if(result.status==0){
            return dialog.error(result.message);
        }
        if(result.status==1){
            return dialog.success(result.message,'/admin/index');
        }

    },'JSON');
}

