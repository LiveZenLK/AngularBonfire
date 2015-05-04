<div class="row">
	<div class="col-6 col-desktop-6">
<textarea class="markdown-edit" ng-model="account.account_profile" value="{{account.account_profile}}" style="white-space: pre-line">
		
</textarea>
<input type="submit" href="#" class="button" ng-click="save(account.account_profile)" value="Save"/><p>{{saved}}</p>
	</div>
	<div class="col-6 col-desktop-6 account-profile-preview">
		<!-- {{account.account_profile}} -->
		<!-- <markdowndisplay></markdowndisplay> -->
		<div marked="account.account_profile">
		</div>
	</div>
</div>


</div>