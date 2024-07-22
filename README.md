# QuoteBase

## Overview
QuoteBase is a modular home quoting solution that streamlines the process of generating sales contracts when an MS Form is completed. This tool sends the results from your order form via Power Automate, processes the data, and generates a tailored quote automatically.

## Features
- **Automatic Quote Generation:** Submit the order form, and QuoteBase processes the data and generates an HTML quotation.
- **Integrated Workflow:** Connects seamlessly with Power Automate to receive order form results and execute the PHP script.
- **Customizable Templates:** Uses a tailored template to create professional and detailed quotes.

## Installation
To get started with QuoteBase, follow these steps:

1. **Prerequisites:** Ensure you have XAMPP or WAMP installed with PHP support.
2. **Setup:**
   - Place the `quotr` directory in the `www` directory of XAMPP/WAMP.
   - Execute the Node.js server by running `server.js`:
     ```sh
     node server.js
     ```
3. **Access the Application:**
   - Open your web browser and go to `http://localhost:3000`.
   - Fill in the form fields and click on "Generate Quote".

## Future Enhancements
We aim to further refine QuoteBase to meet comprehensive quoting needs:
- **Sales Tools:** Provide online electronic brochures and product configuration tools for front-line sales teams, dealerships, and retailer centers.
- **Order Management:** Seamless integration from dealer to factory, incorporating dealer price books and factory price markups.
- **Price Levels:** Build price book price levels based on custom matrices, offering flexibility to sales personnel.
- **Product Configuration:** Integrate product configuration into the quote/contract generation process, allowing for customizable models and options.
- **Business Rules:** Define rules to prevent conflicts and ensure item inclusivity/exclusivity in quotes/contracts.
- **Request for Quote (RFQ):** Fully integrated RFQ feature for pricing any option, routed to corporate pricing for control.
- **Change Order Tracking:** Track all changes to each order, document contract changes, and enable signed change orders.
- **Option Packages/Kits:** Incorporate groups of items/options to create packages for quotes/contracts.
- **Historical Lookup:** Keep track of all RFQs, useful for pricing options quoted months in the past.
- **Product Configurator:** Create models with drop-down menus, multiple choice options, and data entry fields integrated with the corporate price book.

### Current State
- **Workflow:**
  - Fill an order form.
  - Order form data is sent to the app.
  - The app processes the data and executes the PHP script.
  - The PHP script fills the tailored template.
  - Automatically download the HTML quotation.

### Next Steps
- **Customization:** Further tailor the solution to meet specific business requirements.

## Getting Started

### Prerequisites
Ensure you have XAMPP or WAMP installed with PHP support.

### Installation Steps

1. **Download and Setup:**
   - Download the project files.
   - Place the `quotr` directory in the `www` directory of XAMPP/WAMP.

2. **Run the Server:**
   - Open a terminal and navigate to the project directory.
   - Start the Node.js server by running:
     ```sh
     node server.js
     ```

3. **Access the Application:**
   - Open your web browser and go to `http://localhost:3000`.
   - Fill in the required fields and click "Generate Quote" to download your quotation.

## Future Plans

We are committed to enhancing QuoteBase to meet the evolving needs of our users. Some of the planned features include:

- **Advanced Order Management:** Enhanced dealer-to-factory communication and seamless integration of dealer and factory quotes/contracts.
- **Dynamic Price Levels:** Flexibility in building price book levels for various sales scenarios.
- **Comprehensive Product Configurator:** Create detailed models with integrated corporate price books.
- **Robust Change Order Tracking:** Detailed tracking and documentation of all order changes.
- **Enhanced Historical Lookup:** Keep track of all previous RFQs for quick reference.
- **Customizable Contract Totals:** Tailor contract total pages using Excel-like formulas for specific needs.

We welcome feedback and suggestions to make QuoteBase even better.
