import React from "react";
import styled from "styled-components";

const Input = ({ value, onChange, ...props }) => {
  return <InputStyles {...props} value={value} onChange={onChange} />;
};

export default Input;

const InputStyles = styled.input`
  height: 3.4rem;
  width: 25rem;
  font-size: 1.4rem;
  padding: 0 1rem;

  &:focus {
    border: 1px solid blue;
    outline: green;
  }
`;
