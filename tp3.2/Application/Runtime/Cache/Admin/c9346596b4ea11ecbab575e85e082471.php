<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>cms文章管理系统</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>

</head>

    



<body>
<div id="wrapper">

    <?php
 $navs = D("Menu")->getAdminMenus(); $username = getLoginUsername(); foreach($navs as $k=>$v) { if($v['c'] == 'admin' && $username != 'admin') { unset($navs[$k]); } } $index = 'index'; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >cms文章管理系统</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getLoginUsername()?> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($nav["c"])); ?>>
          <a href="<?php echo (getAdminMenuUrl($nav)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i><?php echo ($nav["name"]); ?></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
    <script src="/Public/js/kindeditor/kindeditor-all.js"></script>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="/admin.php?c=content">文章管理</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> 文章添加
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6">

                    <form class="form-horizontal" id="singcms-form">
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">标题:</label>
                            <div class="col-sm-5">
                                <input value="<?php echo ($news["title"]); ?>" type="text" name="title" class="form-control" id="inputname" placeholder="请填写标题">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">短标题:</label>
                            <div class="col-sm-5">
                                <input value="<?php echo ($news["small_title"]); ?>" type="text" name="small_title" class="form-control" id="inputname" placeholder="请填写短标题">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">缩图:</label>
                            <div class="col-sm-5">
                                <input id="file_upload"  type="file" multiple="true" >
                                <img style="display: none" id="upload_org_code_img" src="<?php echo ($news["thumb"]); ?>" width="150" height="150">
                                <input id="file_upload_image" name="thumb" type="hidden" multiple="true" value="<?php echo ($news["thumb"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">标题颜色:</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="title_font_color">
                                    <option value="">==请选择颜色==</option>
                                    <?php if(is_array($titleFontColor)): foreach($titleFontColor as $key=>$color): ?><option value="<?php echo ($key); ?>" <?php if($key == $news['title_font_color']): ?>selected="selected"<?php endif; ?>><?php echo ($color); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">所属栏目:</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="catid">
                                    <?php if(is_array($webSiteMenu)): foreach($webSiteMenu as $key=>$sitenav): ?><option value="<?php echo ($sitenav["menu_id"]); ?>" <?php if($sitenav == $news['catid']): ?>selected="selected"<?php endif; ?> ><?php echo ($sitenav["name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">来源:</label>
                            <div class="col-sm-5">
                                <select class="form-control" name="copyfrom">
                                    <?php if(is_array($copyfrom)): foreach($copyfrom as $key=>$cfrom): ?><option value="<?php echo ($key); ?>" <?php if($key == $news['copyfrom']): ?>selected="selected"<?php endif; ?> ><?php echo ($cfrom); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">内容:</label>
                            <div class="col-sm-5">
                                <textarea class="input js-editor" id="editor_singcms" name="content" rows="20" ><?php echo ($news["content"]); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">描述:</label>
                            <div class="col-sm-9">
                                <input value="<?php echo ($news["description"]); ?>" type="text" class="form-control" name="description" id="inputPassword3" placeholder="描述">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">关键字:</label>
                            <div class="col-sm-5">
                                <input value="<?php echo ($news["keywords"]); ?>" type="text" class="form-control" name="keywords" id="inputPassword3" placeholder="请填写关键词">
                            </div>
                        </div>
                        <input type="hidden" name="news_id" value="<?php echo ($news["news_id"]); ?>"/>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default" id="singcms-button-submit">提交</button>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<script>
    var SCOPE = {
        'save_url' : '/admin.php?c=content&a=add',
        'jump_url' : '/admin.php?c=content',
        'ajax_upload_image_url' : '/admin.php?c=image&a=ajaxuploadimage',
        'ajax_upload_swf' : '/Public/js/party/uploadify.swf',
    };

</script>
<!-- /#wrapper -->
<script src="/Public/js/admin/image.js"></script>
<script>
    // 6.2
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor_singcms',{
            uploadJson : '/admin.php?c=image&a=kindupload',
            afterBlur : function(){this.sync();}, //
        });
    });
</script>

<script>
    var thumb = "<?php echo ($news["thumb"]); ?>";
    if(thumb){
        $("#upload_org_code_img").show();
    }
</script>


<script src="/Public/js/admin/common.js"></script>



</body>

</html>