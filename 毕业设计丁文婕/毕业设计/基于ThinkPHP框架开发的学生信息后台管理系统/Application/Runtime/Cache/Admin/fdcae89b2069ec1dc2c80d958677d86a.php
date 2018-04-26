<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
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
<div class="wrap">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo U('/Admin/index/adminUserManage');?>">管理员管理</a></li>
        <li><a href="<?php echo U('/Admin/index/adminUserAdd');?>">添加管理员</a></li>
        <li class="active"><a href="javascript:;">管理员权限</a></li>
    </ul>
    <form name="form_data" action="<?php echo U('/Admin/AdminUser/ajaxAdminUserExaJuris');?>"
          class="form-horizontal js-ajax-form" novalidate="novalidate">

        <fieldset>
            <div class="table_full">
              <span>用户&nbsp;<?php echo ($admin_user_info['user']); ?>&nbsp;|&nbsp;<?php echo ($admin_user_info['user_name']); ?>&nbsp;权限设置</span>
                <input type="hidden" name="uid" value="<?php echo ($id); ?>">
                <table class="table table-bordered treeTable" id="authrule-tree">
                    <tbody>
                    <?php $__FOR_START_10318__=0;$__FOR_END_10318__=count($admin_menu);for($i=$__FOR_START_10318__;$i < $__FOR_END_10318__;$i+=1){ ?><tr id="node-1" style="" class="initialized parent expanded">
                            <td style="padding-left:30px;">
                              <?php if(count($admin_menu[$i]['one'])): ?><span class="add_sub" style='font-weight:bolder; cursor:pointer; display:inline-block; transform:rotate(-90deg)'>▼</span>
                              <?php else: ?>
                                <span class="add_sub" style='font-weight:bolder; cursor:pointer; display:inline-block; transform:rotate(-90deg);opacity: 0'>▼</span><?php endif; ?>
                                
                             <?php if(in_array($admin_menu[$i]['id'],$admin_user_info['exa_juris'])): ?><input type="checkbox" name="menuid[]" value="<?php echo ($admin_menu[$i]['id']); ?>" level="0" checked="" onclick="javascript:checknode(this);"> 
                             <?php else: ?>
                                 <input type="checkbox" name="menuid[]" value="<?php echo ($admin_menu[$i]['id']); ?>" level="0" onclick="javascript:checknode(this);"><?php endif; ?>
                              <?php echo ($admin_menu[$i]['menu_name']); ?>
                            </td>
                        </tr>
                        <?php $__FOR_START_17376__=0;$__FOR_END_17376__=count($admin_menu[$i]['one']);for($j=$__FOR_START_17376__;$j < $__FOR_END_17376__;$j+=1){ ?><tr id="node-2" class="child-of-node-1 initialized parent expanded index<?php echo ($i); ?>" style="">
                                <td style="padding-left: 50px;">
                                  <?php if(count($admin_menu[$i]['one'][$j]['sec'])): ?><span class="add_sub<?php echo ($i); ?> command" style='font-weight:bolder; cursor:pointer; display:inline-block; transform:rotate(-90deg)'>▼</span>
                                  <?php else: ?>
                                     <span class="add_sub<?php echo ($i); ?>" style='font-weight:bolder; cursor:pointer; display:inline-block; transform:rotate(-90deg);opacity: 0'>▼</span><?php endif; ?>
                                    
                                  &nbsp;&nbsp;&nbsp;├─
                                 <?php if(in_array($admin_menu[$i]['one'][$j]['id'],$admin_user_info['exa_juris'])): ?><input type="checkbox" name="menuid[]" value="<?php echo ($admin_menu[$i]['one'][$j]['id']); ?>" level="1" checked="" onclick="javascript:checknode(this);">
                                 <?php else: ?>
                                     <input type="checkbox" name="menuid[]" value="<?php echo ($admin_menu[$i]['one'][$j]['id']); ?>" level="1" onclick="javascript:checknode(this);"><?php endif; ?> 
                                   <?php echo ($admin_menu[$i]['one'][$j]['menu_name']); ?>
                                </td>
                            </tr>
                            <?php $__FOR_START_10916__=0;$__FOR_END_10916__=count($admin_menu[$i]['one'][$j]['sec']);for($o=$__FOR_START_10916__;$o < $__FOR_END_10916__;$o+=1){ ?><tr id="node-3" class="child-of-node-2 parent initialized sec<?php echo ($i); echo ($j); ?>" style="">
                                    <td style="padding-left: 70px;">&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;&nbsp;└─
                                      <?php if(in_array($admin_menu[$i]['one'][$j]['sec'][$o]['id'],$admin_user_info['exa_juris'])): ?><input type="checkbox" name="menuid[]" value="<?php echo ($admin_menu[$i]['one'][$j]['sec'][$o]['id']); ?>" level="2" checked="" onclick="javascript:checknode(this);">
                                      <?php else: ?>
                                        <input type="checkbox" name="menuid[]" value="<?php echo ($admin_menu[$i]['one'][$j]['sec'][$o]['id']); ?>" level="2" onclick="javascript:checknode(this);"><?php endif; ?>
                                        <?php echo ($admin_menu[$i]['one'][$j]['sec'][$o]['menu_name']); ?>
                                    </td>
                                </tr><?php } } } ?>

                    
                    </tbody>
                </table>
            </div>
            <div class="form-actions">
                <button type="button" onclick="adminUserInfo()" class="btn btn-primary  js-ajax-submit">添加</button>
                <a class="btn" href="javascript:history.back(-1);">返回</a>
            </div>
        </fieldset>
    </form>
</div>
<script src="/Public/admin/js/load.js"></script>
<!-- 公共 -->
<script src="/Public/common/js/jquery-1.8.3.min.js"></script>
<script src="/Public/common/js/bootstrap.min.js"></script>



<script type="text/javascript" src="/Public/admin/js/ajaxpost_admin.js"></script>
<script type="text/javascript">
    function checknode(obj) {
        var chk = $("input[type='checkbox']");
        var count = chk.length;
        var num = chk.index(obj);
        var level_top = level_bottom = chk.eq(num).attr('level');
        for (var i = num; i >= 0; i--) {
            var le = chk.eq(i).attr('level');
            if (le < level_top) {
                chk.eq(i).prop("checked", true);
                var level_top = level_top - 1;
            }
        }
        for (var j = num + 1; j < count; j++) {
            var le = chk.eq(j).attr('level');
            if (chk.eq(num).prop("checked")) {
                if (le > level_bottom) {
                    chk.eq(j).prop("checked", true);
                }
                else if (le == level_bottom) {
                    break;
                }
            } else {
                if (le > level_bottom) {
                    chk.eq(j).prop("checked", false);
                } else if (le == level_bottom) {
                    break;
                }
            }
        }
    }


    $('.child-of-node-1,.child-of-node-2').css({'display':'none'});
    function toggleShow(name1,name2,name3){
        $(name1).each(function(i){
            var that=this;
            $(this).on('click',function(){
                if($(name2+i).css('display')=='none'){
                    $(name2+i).show();
                    $(that).css({'transform':'rotate(0deg)'});
                }else{
                    $(name2+i).hide();
                    $(name3).hide();
                    // $('.add_sub'+i).css({'transform':'rotate(-90deg)'});
                    $(that).css({'transform':'rotate(-90deg)'});
                }
            });
        });
    }
    $('.command').each(function(i){
        console.log('.add_sub'+i,'.child-of-node-2.sec'+i);
        toggleShow('.add_sub'+i,'.child-of-node-2.sec'+i);
    });
    toggleShow('.add_sub','.child-of-node-1.index','.child-of-node-2');


    // $('.child-of-node-1').each(function(i){
    //     var that=this;
    //     $(this).on('click',function(){
    //         if($(that).next().attr('id')=='node-3'){
    //             if($(that).next().css('display')=='none'){
    //                 $(that).next().show();
    //             }else{
    //                 $(that).next().hide();
    //             }
    //         }
    //     });
    // });


    // $('.parent').on('click',function () {
    //             toggle(this);
    //         })
      
    //     function toggle(self) {
    //         var id = $(self).attr('id').split('-')[1];
    //         if($(self).hasClass('collapsed')){
    //             $(self).removeClass('collapsed').addClass('expanded');
    //             $('.child-of-node-' + id).css('display','table-row');
    //             $(self).children('.parent').trigger('click');
    //         }else{
    //             $(self).removeClass('expanded').addClass('collapsed');
    //             $('.child-of-node-' + id).css('display','none');
    //             $(self).children('.parent').trigger('click');
    //         }
    //     }
</script>
</body>
</html>