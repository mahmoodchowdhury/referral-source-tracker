jQuery(document).ready(function($) {
    // Check if the hidden input field exists and if referralSourceData is available
    if (typeof referralSourceData !== 'undefined' && referralSourceData.referralSource) {
        $('input[name="referral_source"]').val(referralSourceData.referralSource);
    }
});
