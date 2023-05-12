import Input from "./Input";

export default function TypeData({ typeName }) {
  return (
    <div className={`input-data-${typeName}`}>
      {typeName === "DVD" && (
        <>
          <Input
            className="input-field"
            type="text"
            id="size"
            labelName="Size (MB)"
          />
          <p>Please, provide size</p>
        </>
      )}
      {typeName === "Furniture" && (
        <>
          <Input
            className="input-field"
            type="text"
            id="height"
            labelName="Height (CM)"
          />
          <Input
            className="input-field"
            type="text"
            id="width"
            labelName="Width (CM)"
          />
          <Input
            className="input-field"
            type="text"
            id="length"
            labelName="Length (CM)"
          />
          <p>Please, provide dimensions</p>
        </>
      )}
      {typeName === "Book" && (
        <>
          <Input
            className="input-field"
            type="text"
            id="weight"
            labelName="Weight (KG)"
          />
          <p>Please, provide weight</p>
        </>
      )}
    </div>
  );
}
