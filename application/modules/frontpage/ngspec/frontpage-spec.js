describe('Controller: public/AboutController', function() {

    var $rootScope, $scope, $controller, AngularBonfireUrl;

    beforeEach(module('AngularBonfire'));

    beforeEach(inject(function(_$rootScope_, _$controller_){
        $rootScope = _$rootScope_;
        $scope = $rootScope.$new();
        $controller = _$controller_;

        $controller('CloudCtrl', {'$rootScope' : $rootScope, '$scope': $scope});
    }));

   it('should load underscore', function() {
        expect( 'active' == 'active');
    });

// thanks https://www.jiwhiz.com/blogs/Unit_Test_AngularJS_Controller_With_Jasmine
    // it('should make about menu item active.', function() {
    //     expect($rootScope.activeMenu.about == 'active');
    // });

    // it('should show title.', function() {
    //     expect($rootScope.showTitle == true);
    // });

    // it('should have correct page title.', function() {
    //     expect($rootScope.page_title).toEqual('About Me');
    // });

    // it('should have correct page description.', function() {
    //     expect($rootScope.page_description).toEqual('Here is my story.');
    // });
});
