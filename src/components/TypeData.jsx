import { useState } from "react";
import Input from "./Input";

export default function TypeData({ typeName }) {
  const [isNotValid, setIsNotValid] = useState(false);
  const numRegex = /^[0-9.]+$/;

  return (
    <>
      {typeName === "DVD" && (
        <>
          <Input
            onChange={(e) =>
              setIsNotValid(
                !numRegex.test(e.target.value) && e.target.value.length > 0
              )
            }
            className="input-field"
            type="text"
            id="size"
            name="size"
            labelName="Size (MB)"
          />
          <p className="description">Please, provide size</p>
        </>
      )}
      {typeName === "Furniture" && (
        <>
          <Input
            onChange={(e) =>
              setIsNotValid(
                !numRegex.test(e.target.value) && e.target.value.length > 0
              )
            }
            className="input-field"
            type="text"
            id="height"
            name="height"
            labelName="Height (CM)"
          />
          <Input
            onChange={(e) =>
              setIsNotValid(
                !numRegex.test(e.target.value) && e.target.value.length > 0
              )
            }
            className="input-field"
            type="text"
            id="width"
            name="width"
            labelName="Width (CM)"
          />
          <Input
            onChange={(e) =>
              setIsNotValid(
                !numRegex.test(e.target.value) && e.target.value.length > 0
              )
            }
            className="input-field"
            type="text"
            id="length"
            name="length"
            labelName="Length (CM)"
          />
          <p className="description">Please, provide dimensions</p>
        </>
      )}
      {typeName === "Book" && (
        <>
          <Input
            onChange={(e) =>
              setIsNotValid(
                !numRegex.test(e.target.value) && e.target.value.length > 0
              )
            }
            className="input-field"
            type="text"
            id="weight"
            name="weight"
            labelName="Weight (KG)"
          />
          <p className="description">Please, provide weight</p>
        </>
      )}
      {isNotValid && <p>Please, provide the data of indicated type</p>}
    </>
  );
}
