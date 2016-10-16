var image = ['image/gif', 'image/jpg', 'image/jpeg', 'image/bmp', 'image/png'];
$(function() {
    upload('#part_time_magazine_upload', 'part_time_magazine_upload');
    upload('#substitute_upload', 'substitute_upload');
    upload('#exam_rank_upload', 'exam_rank_upload');
    upload('#attendance_award_upload', 'attendance_award_upload');
    upload('#outstand_sub_upload', 'outstand_sub_upload');
});
/**
 * 上传函数
 */
function upload(id, id_name){
    var uploader;
    // 初始化Web Uploader
    uploader = WebUploader.create({
        // 自动上传。
        auto: true,
        // swf文件路径
        swf: 'Uploader.swf',
        // 文件接收服务端。
        server: '/index.php/school/upload',
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: id
        // 只允许选择文件，可选。
    });

    // 当有文件被添加进队列的时候
    uploader.on( 'fileQueued', function() {
        $(id).html('正在上传...');
    });
    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on( 'uploadSuccess', function(file, data ) {
        if(data.result == '0000'){
            alert('上传成功！');
            $('#'+id_name+'_data').val(data.data.path2);
            var second = '<button id="second'+id_name+'" class="btn_primary">重新上传</button>';
            $(id).html(second);
            var html = '<a target="_blank" style="margin-left: 20px" href='+data.data.path+ '>点击预览</a>';
            $(id).after().append(html);
            $('#second'+id_name).click(function(){
                $(id).html('重新上传');
                $('#'+id_name+'_data').val('');//将已经上传成功的文件置空
                upload(id);
            });
        }else{
           alert('上传失败');
        }
    });
    // 文件上传失败，现实上传出错。
    uploader.on( 'uploadError', function( file, data) {
        $(id).html('上传失败');
    });
    uploader.on( 'uploadProgress', function() {
        $(id).html('正在上传...');
    });

    $(id).click(function(){
        //uploader.upload(id);
    });
}
/**
 * 字节替换函数
 * @param bytes
 * @returns {*}
 */
function bytesToSize(bytes) {
    if (bytes === 0) return '0 B';
    var k = 1024;
    sizes = ['B','KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    i = Math.floor(Math.log(bytes) / Math.log(k));
    return (bytes / Math.pow(k, i)).toPrecision(2) + ' ' + sizes[i];
    //toPrecision(2) 后面保留两位位小数，如1.0GB
    // return (bytes / Math.pow(k, i)).toPrecision(3) + ' ' + sizes[i];
}
