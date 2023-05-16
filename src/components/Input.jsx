export default function Input(props) {
  const { id, labelName, ...rest } = props;

  return (
    <div className="input-group">
      <label htmlFor={id}>{labelName}</label>
      <input required {...rest} id={id} />
    </div>
  );
}
