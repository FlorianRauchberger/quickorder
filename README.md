# QuickOrder

## Overview

QuickOrder is a Magento 2 module that enhances the checkout cart page by allowing users to quickly add products to their cart using the product SKU. This feature is designed to streamline the ordering process for customers who know the SKUs of the products they want to purchase, making the shopping experience faster and more efficient.

## Features

- Add products to the cart by entering their SKU directly on the checkout cart page.
- Instant addition of products without the need to navigate away from the cart page.
- User-friendly interface for quick and easy product addition.

## Installation

To install the QuickOrder module, follow these steps:

1. Download the module package and extract it to the `app/code/Rauchberger/QuickOrder` directory of your Magento installation.
2. Open a terminal and navigate to the root of your Magento installation.
3. Run the following command to enable the module and set up your environment:

    ```sh
    bin/magento module:enable QuickOrder && bin/magento setup:di:compile && bin/magento setup:upgrade && bin/magento cache:clean
    ```

## Usage

Once the module is installed and enabled, a new section will appear on the checkout cart page where customers can input the SKU of the product they wish to add to their cart. By entering the SKU and submitting, the product will be instantly added to the cart.

## Support

If you encounter any issues or have any questions about using this module, please open an issue on the GitHub repository. We will do our best to assist you.

## License

This module is licensed under the MIT License. See the LICENSE file for more details.