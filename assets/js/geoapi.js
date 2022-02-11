$(document).ready(function () {
    const apiUrl = "https://geo.api.gouv.fr/communes?codePostal=";
    const format = '&format=json';

    let zipcode = $('#postal');
    let city = $('#city');
    let errorMessage = $('#errorMessage');

    $(zipcode).on('blur', function () {
        let code = $(this).val();

        let url = apiUrl + code + format;
        // console.log(url); 
        fetch(url, { method: 'get' }).then(response => response.json()).then(results => {
            // console.log(resuluts); 
            $(city).find('option').remove();
            if (results.length) {
                $(errorMessage).text('').hide();
                $.each(results, function (key, value) {
                    //console.log(value);
                    $(city).append('<option value="' + value.nom + '">' + value.nom + '</option>');
                });
            } else {
                if ($(zipcode).val()) {
                    console.log('Erreur de code postal.');
                    $(errorMessage).text('Aucune commune avec ce code postal').show();
                } else {
                    $(errorMessage).text('').hide();
                    $(city).find('option').remove();
                }
            }
        }).catch(err => {
            console.log(err);
            $(city).find('option').remove();
        })
    })
});


$(document).ready(function () {
    const apiUrl = "https://geo.api.gouv.fr/communes?codePostal=";
    const format = '&format=json';

    let zipcode = $('#postall');
    let city = $('#cityy');
    let errorMessage = $('#errorMessage');

    $(zipcode).on('blur', function () {
        let code = $(this).val();

        let url = apiUrl + code + format;
        // console.log(url); 
        fetch(url, { method: 'get' }).then(response => response.json()).then(results => {
            // console.log(resuluts); 
            $(city).find('option').remove();
            if (results.length) {
                $(errorMessage).text('').hide();
                $.each(results, function (key, value) {
                    //console.log(value);
                    $(city).append('<option value="' + value.nom + '">' + value.nom + '</option>');
                });
            } else {
                if ($(zipcode).val()) {
                  
                    $(errorMessage).text('Aucune commune avec ce code postal').show();
                } else {
                    $(errorMessage).text('').hide();
                    $(city).find('option').remove();
                }
            }
        }).catch(err => {
            console.log(err);
            $(city).find('option').remove();
        })
    })
});


