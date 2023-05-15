import Input from "./Input";
import { useState } from "react";
import TypeData from "./TypeData";

export default function Form() {
  const [productType, setProductType] = useState("");

  return (
    <div className="form-box">
      <form id="product_form" action="add-product.php" method="GET">
        <div className="data-inputs">
          <Input
            className="input-field"
            type="text"
            id="sku"
            name="sku"
            labelName="SKU"
          />
          <Input
            className="input-field"
            type="text"
            id="name"
            name="name"
            labelName="Name"
          />
          <Input
            className="input-field"
            type="text"
            id="price"
            name="price"
            labelName="Price"
          />
        </div>

        <div className="select-box">
          <label htmlFor="productType">Type Switcher</label>
          <select
            required
            id="productType"
            name="type-select"
            onChange={(e) => setProductType(e.target.value)}
          >
            <option value="">Select type:</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
          </select>
        </div>

        <div className="type-data-box">
          {productType && <TypeData typeName={productType} />}
        </div>
      </form>
    </div>
  );
}
