<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0053)http://www.thinkcmfx.com/index.php/Admin/setting/site -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 与首页的一样  重复加载 start -->
    <link href="/Public/admin/css/theme.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/admin/css/simplebootadminindex.min.css">
<link href="/Public/admin/css/simplebootadmin.css" rel="stylesheet">


<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
<![endif]-->

<!-- 公共 -->
<link href="/Public/common/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- 与首页的一样  重复加载 end -->

</head>
<body>
<div class="wrap js-check-wrap">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#A" data-toggle="tab">网站信息</a></li>
        <li><a href="#B" data-toggle="tab">SEO设置</a></li>
        <!-- <li><a href="#C" data-toggle="tab">URL设置</a></li> -->

        <!-- <li><a href="#D" data-toggle="tab">UCenter</a></li> -->
        <!-- <li><a href="#E" data-toggle="tab">评论设置</a></li>
        <li><a href="#F" data-toggle="tab">用户名过滤</a></li>
        <li><a href="#G" data-toggle="tab">CDN设置</a></li> -->
    </ul>
    <form id="post_sites" name="post_sites" class="form-horizontal js-ajax-forms" action="<?php echo U('Admin/sites/ajaxUpdataSites');?>" method="post" novalidate="novalidate">
        <fieldset>
            <div class="tabbable">
                <div class="tab-content">
                    <div class="tab-pane active" id="A">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">网站名称</label>

                                <div class="controls">
                                    <input type="text" name="options[site_name]" value="<?php echo ($sites['site_name']); ?>">
                                    <span class="form-required">*</span>
                                    <input type="hidden" name="option_id" value="<?php echo ($sites['id']); ?>">
                                </div>
                            </div>
                            <!-- <div class="control-group">
                                <label class="control-label">后台地址加密码：</label>
                                <div class="controls">
                                    <input type="text" name="options[site_admin_url_password]" value=""
                                           id="js-site-admin-url-password">
                                    <span class="form-required">*</span>
                                    <span class="help-block" style="color: red;">设置加密码后必须通过以下地址访问后台,请劳记此地址，为了安全，您也可以定期更换此加密码!</span>
                                </div>
                            </div> -->
                            <!-- <div class="control-group">
                                <label class="control-label">模版方案</label>
                                <div class="controls">
                                    <select name="options[site_tpl]">
                                        <option value="simplebootx" selected="">simplebootx</option>
                                        <option value="simplebootx_en-us">simplebootx_en-us</option>
                                        <option value="simplebootx_mobile">simplebootx_mobile</option>
                                        <option value="simplebootx_mobile_en-us">simplebootx_mobile_en-us</option>
                                        <option value="yashan">yashan</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="control-group">
                                <label class="control-label">开启手机模板：</label>
                                <div class="controls">
                                    <label class="checkbox inline">
                                      <input type="checkbox" name="options[mobile_tpl_enabled]" value="1">
                                    </label>
                                </div>
                            </div> -->
                            <!-- <div class="control-group">
                                <label class="control-label">后台风格</label>
                                <div class="controls">
                                    <select name="options[site_adminstyle]">
                                        <option value="bluesky">bluesky</option>
                                        <option value="flat" selected="">flat</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="control-group">
                                <label class="control-label">开启静态缓存：</label>

                                <div class="controls">
                                    <label class="checkbox inline"><input type="checkbox" name="options[html_cache_on]"
                                                                          value="1"></label>
                                </div>
                            </div> -->
                            <div class="control-group">
                                <label class="control-label">备案信息</label>
                                <div class="controls">
                                    <input type="text" name="options[site_icp]" value="<?php echo ($sites['site_icp']); ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">站长邮箱</label>
                                <div class="controls">
                                    <input type="text" name="options[site_admin_email]" value="<?php echo ($sites['site_admin_email']); ?>">
                                </div>
                            </div>
                             <div class="control-group">
                                <label class="control-label">站长QQ</label>
                                <div class="controls">
                                    <input type="text" name="options[site_admin_qq]" value="<?php echo ($sites['site_admin_qq']); ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">站长微博</label>
                                <div class="controls">
                                    <input type="text" name="options[site_admin_sina_weibo]" value="<?php echo ($sites['site_admin_sina_weibo']); ?>">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">友情链接</label>
                                <div class="controls">
                                  <textarea name="options[site_links]" rows="5" cols="57"><?php echo ($sites['site_links']); ?></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">统计代码</label>
                                <div class="controls">
                                  <textarea name="options[site_statistics]" rows="5" cols="57"><?php echo ($sites['site_statistics']); ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">版权信息</label>
                                <div class="controls">
                                  <textarea name="options[site_copyright]" rows="5" cols="57"><?php echo ($sites['site_copyright']); ?></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane" id="B">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">SEO标题</label>
                                <div class="controls">
                                    <input type="text" name="options[site_seo_title]" value="<?php echo ($sites['site_seo_title']); ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">SEO关键字</label>
                                <div class="controls">
                                    <input type="text" name="options[site_seo_keywords]"
                                           value="<?php echo ($sites['site_seo_keywords']); ?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">SEO描述</label>
                                <div class="controls">
                                    <textarea name="options[site_seo_description]" rows="5" cols="57"><?php echo ($sites['site_seo_description']); ?></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <!-- <div class="tab-pane" id="C">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">url模式</label>
                                <div class="controls">
                                    <select name="options[urlmode]">
                                        <option value="0">普通模式</option>
                                        <option value="1" selected="">PATHINFO模式</option>
                                        <option value="2">REWRITE模式</option>
                                    </select>
                                    <span class="form-required">* 如果你开启的是REWRITE模式，请确保服务器支持REWRITE!</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">URL伪静态后缀</label>
                                <div class="controls">
                                    <input type="text" name="options[html_suffix]" value="">
                                    <span class="form-required">普通模式不支持</span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane" id="E">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">评论审核</label>
                                <div class="controls">
                                    <input type="checkbox" class="js-check" name="options[comment_need_check]"
                                           value="1">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">评论时间间隔</label>
                                <div class="controls">
                                    <input type="number" name="options[comment_time_interval]" value="60"
                                           style="width:40px;">秒
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane" id="F">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">特殊用户名</label>
                                <div class="controls">
                                    <textarea name="cmf_settings[banned_usernames]" rows="5" cols="57"></textarea>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane" id="G">
                        <fieldset>
                            <div class="control-group">
                                <label class="control-label">静态资源cdn地址</label>
                                <div class="controls">
                                    <input type="text" name="cdn_settings[cdn_static_root]" value="">
										<span class="help-block">
											不能以/结尾；设置这个地址后，请将ThinkCMF下的静态资源文件放在其下面；<br>
											ThinkCMF下的静态资源文件大致包含以下(如果你自定义后，请自行增加)：<br>
											admin/themes/simplebootx/Public/assets<br>
											public<br>
											themes/simplebootx/Public/assets<br>
											例如未设置cdn前：jquery的访问地址是/public/js/jquery.js, 设置cdn是后它的访问地址就是：静态资源cdn地址+/public/js/jquery.js	
										</span>
                                </div>
                            </div>
                        </fieldset>
                    </div> -->
                </div>
            </div>
            <div class="form-actions">
                <button type="button" onclick="ajax_post_sites_up()" class="btn btn-primary  js-ajax-submit">保存</button>
            </div>
        </fieldset>
    </form>
</div>
<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>



<script type="text/javascript" src="/Public/Admin/js/ajaxpost_sites.js"></script>
</body>
</html>