import React from "react";
import styled from "styled-components";

const Button = ({ onClick, children, ...props }) => {
  return (
    <ButtonStyles onClick={onClick} {...props}>
      {children}
    </ButtonStyles>
  );
};
export default Button;

const ButtonStyles = styled.button`
  padding: 0.6rem 1.4rem;
  background: #008080;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  color: white;

  &:hover {
    background: #007070;
  }
`;
