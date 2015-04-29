<div ng-app="fileUpload" ng-controller="AccountImageCtrl">

    <!-- <div class="button" ngf-select ngf-change="upload($files)">Upload on file change</div> -->
    I<img ngf-thumbnail="files[0]" class="thumb" ng-src="<?php echo site_url();?>/images/{{image}}">
     <!-- <img /> -->
    
    <div class="button" ngf-select ng-model="files">Upload using model $watch</div>
    <div ngf-drop ng-model="files" class="drop-box" 
        ngf-drag-over-class="dragover" ngf-multiple="true" ngf-allow-dir="true"
        ngf-accept="'.jpg,.png,.pdf'">Drop Images or PDFs files here</div>
    <div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
</div>