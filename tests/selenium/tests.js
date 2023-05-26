const pageUnderTest = 'http://localhost/florist/index.php';
const {By, Builder} = require('selenium-webdriver');
const assert = require('assert');
require('geckodriver');

async function testClickThroughSite() {
    // starting driver and going to the site
    const driver = await new Builder().forBrowser('firefox').build();
    await driver.get(pageUnderTest);

    // navigate to the inventory page
    await driver.findElement(By.css('.btn-container .btn:nth-of-type(2)')).click();

    // assert that we are on the inventory page
    const inventoryTitle = await driver.findElement(By.css(`.img-text-flex h2`)).getText();
    assert.strictEqual(inventoryTitle, "Our current inventory");

    // select the imperial height 
    await driver.findElement(By.css('select[name="select_height"] > option[value="M"]')).click();
    const imperialHeight = await driver.findElement(By.css(`.inventory tr:nth-of-type(2) td:last-of-type`)).getText();
    // assert that the height has changed
    assert.strictEqual(imperialHeight, "354.33");

    // select the metric heigth
    await driver.findElement(By.css('select[name="select_height"] > option[value="I"]')).click();
    const metricHeight = await driver.findElement(By.css(`.inventory tr:nth-of-type(2) td:last-of-type`)).getText();
    // assert that the height has changed
    assert.strictEqual(metricHeight, "900");

    // navigate to the about us page
    await driver.findElement(By.css('.btn-container .btn:nth-of-type(3)')).click();

    // assert that we are on the about us page
    const aboutUsTitle = await driver.findElement(By.css(`.aboutus-text-container h2`)).getText();
    assert.strictEqual(aboutUsTitle, "About Us");
    
    // navigate back to the frontpage
    await driver.findElement(By.css('.btn-container .btn:nth-of-type(1)')).click();

    await driver.quit();
}

testClickThroughSite();