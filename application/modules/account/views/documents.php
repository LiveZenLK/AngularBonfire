
<div ng-app="fileUpload" ng-controller="AccountDocumentCtrl">

    <!-- <div class="button" ngf-select ngf-change="upload($files)">Upload on file change</div> -->
     <!-- <img /> -->
    <aside clas="row">
    	<div class="col-6">
    		<div ngf-no-file-drop>File Drag/Drop is not supported for this browser</div>
    	</div>
    	<div class="col-6">
    		<div class="button-link" ngf-select ng-model="files">Upload cv using filesystem under construction</div>
    	</div>
    	<div class="row">
    		<div class="col-12">
    		<ul>
    			<li ng-repeat="document in documents">I<a href="<?php echo site_url();?>/documents/{{document}}"></li>
    		</ul>
    </aside>
</div> 
