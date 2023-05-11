'use strict';

const API_URL = 'api/index.php';
// convert currency
document.querySelector('#select_currency').addEventListener('change', function(e) {
    $('.inventory tr').each( async (elm) => {
        const to = document.querySelector('#select_currency').value;
        const from = (to === 'DKK' ? 'USD' : 'DKK')
        if(elm > 0){
            const currentPrice = $(`.inventory tr:nth-of-type(${elm + 1})`).children().eq(3).html();
            const pricePlacement = $(`.inventory tr:nth-of-type(${elm + 1})`).children().eq(3);
            const newPrice = await sendCurrencyConvert(currentPrice, from, to);
            console.log(newPrice);
            pricePlacement.html(newPrice);
        }
    })
});

// convert heigths
document.querySelector('#select_height').addEventListener('change', function(e) {
    $('.inventory tr').each( async (elm) => {
        const system = document.querySelector('#select_height').value;
        if(elm > 0){
            const maxMeasure = $(`.inventory tr:nth-of-type(${elm + 1})`).children().last().html();
            const maxPlacement = $(`.inventory tr:nth-of-type(${elm + 1})`).children().last();
            const newMaxNum = await sendHeightConvert(maxMeasure, system);
            maxPlacement.html(newMaxNum);
            // --------
            const minMeasure = $(`.inventory tr:nth-of-type(${elm + 1})`).children().eq(-2).html();
            const minPlacement = $(`.inventory tr:nth-of-type(${elm + 1})`).children().eq(-2);
            const newMinNum = await sendHeightConvert(minMeasure, system);
            minPlacement.html(newMinNum);
        }
    })
});

async function sendHeightConvert(measure, system){
    const result = $.ajax({
        url: API_URL,
        method: 'POST',
        data: {
            'conversion': 'length',
            'measure': measure,
            'system': system
        }
    })
    return result;
}

async function sendCurrencyConvert(measure, from, to){
    console.log('measure', measure, 'from', from, 'to', to);
    const result = $.ajax({
        url: API_URL,
        method: 'POST',
        data: {
                'conversion': 'currency',
                'action': 'convert',
                'measure': measure,
                'baseCurrency': from,
                'destinationCurrency': to
        }
    })
    return result;
}