import React from "react";
const className = (...arr) => arr.filter(Boolean).join(' ')
export const Field = React.forwardRef(({help, name, children, error, onChange, required, minlength}, ref) => {
    if (error){
        help = error
    }
    return <div className={className('form-group', error && 'has-error')}>
        <label htmlFor={name} className="control-label">{children}</label>
        <textarea className="form-control" ref={ref} name={name} id={name}
                  onChange={onChange} required={required} minLength={minlength} rows="10"/>
        {help && <div className="help-block">{help}</div>}
    </div>
})