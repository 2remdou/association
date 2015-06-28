/**
 * Created by delphinsagno on 28/06/15.
 */

app.config(function(RestangularProvider){
    //RestangularProvider.setBaseUrl('/association/web/api');
    RestangularProvider.setBaseUrl('/association/web/app_dev.php/api/');
    RestangularProvider.setRequestInterceptor(function(elem, operation) {
        if (operation === "put") {
            delete elem.id;
        }
        return elem;
    })
});