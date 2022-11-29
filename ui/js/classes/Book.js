export class Employee {
    constructor(sku, name, price) {
        this.sku = sku;
        this.name = name;
        this.price = price;
        
        this.validate = {
            rules: {
                sku: 
            },
            message: {

            }
        };

    }
  
    validate() {
      this.salary += 100;
    }
  }