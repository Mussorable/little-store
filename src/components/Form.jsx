import Input from "./Input";
import { useState } from "react";
import TypeData from "./TypeData";

export default function Form({ handleFormSubmit }) {
  const [productType, setProductType] = useState("DVD");

  return (
    <div className="form-box">
      <form
        id="product_form"
        action="index.php"
        method="GET"
        onSubmit={handleFormSubmit}
      >
        <div className="data-inputs">
          <Input className="input-field" type="text" id="sku" labelName="SKU" />
          <Input
            className="input-field"
            type="text"
            id="name"
            labelName="Name"
          />
          <Input
            name="name"
            className="input-field"
            type="text"
            id="price"
            labelName="Price"
          />
        </div>

        <div className="select-box">
          <label htmlFor="productType">Type Switcher</label>
          <select
            name=""
            id="productType"
            onChange={(e) => setProductType(e.target.value)}
          >
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
