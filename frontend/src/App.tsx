import { useState } from 'react';
import './App.css';
import Button from "@mui/material/Button";

function App() {
  const [count, setCount] = useState(0);

  return (
    <>
      <div style={{ padding: 20 }}>
        <Button variant="contained" color="primary">
          Testar Material UI
        </Button>
      </div>
    </>
  )
}

export default App
