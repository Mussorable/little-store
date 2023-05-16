export default function Checkbox(props) {
  const { id, handleCheckboxClick, ...rest } = props;

  return (
    <div className="input-group">
      <label className="sr-only" htmlFor={id}>
        Delete:
      </label>
      <input
        {...rest}
        onChange={handleCheckboxClick}
        className="delete-checkbox"
        type="checkbox"
        id={id}
      />
    </div>
  );
}
