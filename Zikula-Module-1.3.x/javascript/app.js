

Zikula.define('Store.UI');

Zikula.Store.UI.Edit = {
    init: function() {
        Zikula.Users.NewUser.addValidatorHandler('module.store.users_ui_handler', Zikula.Store.UI.Edit.getRegistrationErrorsResponse)
    },
    
    /**
     * Process an AJAX response after checking the form contents for errors, and display the appropriate error information.
     *
     * @param req The AJAX response information
     */
    getRegistrationErrorsResponse: function(errorFieldsCount, errorFields)
    {
        if (errorFieldsCount > 0) {
            errorFields.each(function(pair){
                var element = $('acceptpolicies_' + pair.key);
                if (element) {
                    element.addClassName('z-form-error');
                }

                element = $('acceptpolicies_' + pair.key + '_error');
                element.update(pair.value);
                element.removeClassName('z-hide');
            });
        }
    }
}

//document.observe("dom:loaded", Zikula.Store.UI.Edit.init);
document.observe("dom:loaded", product_title_init);


function product_title_init()
{
//    Event.observe('news_title', 'change', savedraft);
//    $('news_urltitle_details').hide();

    //$('product_status_info').hide();
    //$('product_picture_warning').hide();

    // not the correct location but for reference later on:
    //new PeriodicalExecuter(savedraft, 30);
}


