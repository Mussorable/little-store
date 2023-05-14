import Input from "./Input";

export default function TypeData({ typeName }) {
  return (
    <>
      {typeName === "DVD" && (
        <>
          <Input
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
            className="input-field"
            type="text"
            id="height"
            name="height"
            labelName="Height (CM)"
          />
          <Input
            className="input-field"
            type="text"
            id="width"
            name="width"
            labelName="Width (CM)"
          />
          <Input
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
            className="input-field"
            type="text"
            id="weight"
            name="weight"
            labelName="Weight (KG)"
          />
          <p className="description">Please, provide weight</p>
        </>
      )}
    </>
  );
}
