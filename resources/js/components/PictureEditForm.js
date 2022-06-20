import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useState } from 'react';
import Select from 'react-select';

function PictureEditForm({pictureid}) {  
  const [orders, setOrders] = useState([]);
  const [themes, setThemes] = useState([]);

  const [url, setUrl] = useState('');
  const [description, setDescription] = useState('');
  const [selectedTheme, setSelectedTheme] = useState([
    {
      id: '',
      title: ''
    }
  ])
  const [selectedOrder, setSelectedOrder] = useState([
    {
      id: '',
      location: '',
      customer_name: '',
      description: ''
    }
  ])
  
  const getOrders = () => {    
    axios.get('/api/admin/order-processing')
    .then(res => {      
      setOrders(res.data.data);      
    })
    .catch(e => console.log(e.res));     
  }

  const getThemes = () => {    
    axios.get('/api/admin/themes-for-select')
    .then(res => {      
      setThemes(res.data.data);      
    })
    .catch(e => console.log(e.res));     
  }

  const getPicture = () => {
    axios.get(`/api/admin/picture-for-edit/${pictureid}`)
    .then(res => {      
      setUrl(res.data.data.url);
      setDescription(res.data.data.description);
      setSelectedTheme(res.data.data.theme);
      setSelectedOrder(res.data.data.order);      
    })
    .catch(error => console.log(error.res))
  }

  useEffect(() => {
    getOrders();
    getThemes();
    getPicture();   
  }, []);  

  const update = (e) => {
    e.preventDefault();        
    let data = {
      description: description.trim(),
      theme_id: selectedTheme.id,
      order_id: selectedOrder.id
    }   

    axios.patch(`/admin/picture/${pictureid}`, data)
    .then(res => {
      if (res.status == 200) {
        console.log(`${window.location.host}/admin/picture/${pictureid}`)      
        window.location.href = `/admin/picture/${pictureid}`;
      }
    })
    .catch(error => console.log(error.res))
  }  

  return (
    <div>
      <div>
        <img src={url} alt={description} style={{width:"150px", marginBottom:"5px"}}/>
      </div>
      <form onSubmit={update}>

        <div className="form-group">        
          <textarea name='description' className="form-control mb-3" rows="4" value={description} onChange={(e) => setDescription(e.target.value)}/>               
        </div>         

        <div className='form-group  mt-3 mb-5'>
          <label htmlFor="select_theme" className="form-label">Выберите тему</label>
          <Select
            name='theme_id'
            id='select_theme'
            className='mb-5'
            isSearchable
            isClearable
            defaultValue={selectedTheme}
            value={selectedTheme}
            onChange={setSelectedTheme}            
            getOptionLabel={option => option.title}
            getOptionValue={option => option.id}
            options={themes}              
          />
        </div>   

        <div className='form-group  mt-3 mb-5'>
          <label htmlFor="select_order" className="form-label">Выберите заявку</label>
          <Select
            name='order_id'
            id='select_order'
            className='mb-5'
            isSearchable
            isClearable
            defaultValue={selectedOrder}
            value={selectedOrder}
            onChange={setSelectedOrder}            
            getOptionLabel={option => [`${option.location} | `, `${option.customer_name} | `, ` ${option.description}`]}
            getOptionValue={option => option.id}
            options={orders}              
          />
        </div>              

        <div className="d-block">
          <button type="submit" className="btn btn-primary btn-lg btn-block mt-1 w-100">Submit</button> 
        </div>    
      </form>      
    </div>
  )
}

export default PictureEditForm;

if (document.getElementById('pictureEditForm')) {
  const element = document.getElementById('pictureEditForm');
  const props = Object.assign({}, element.dataset)
    ReactDOM.render(<PictureEditForm {...props}/>, element);
}
