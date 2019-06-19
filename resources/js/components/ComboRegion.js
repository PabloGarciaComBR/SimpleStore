import React, { Component } from 'react'
import Select from 'react-select'
import DropdownCountry from './DropdownCountry'

const optionsCountry = [
  { value: 'chocolate', label: 'Chocolate' },
  { value: 'strawberry', label: 'Strawberry' },
  { value: 'vanilla', label: 'Vanilla' },
]

export default class ComboRegion extends Component {
  constructor (props) {
    super(props);
    this.state = { country: '', region: '' }
  }

  selectCountry = (val) => {
    this.setState({ country: val })

    // console.log(val.value,val.label)
  }

  selectRegion = (val) => {
    this.setState({ region: val })
  }

  render() {
    //const { country, region } = this.state

    return (
      <div>
        <DropdownCountry onChange={ (val) => this.selectCountry(val) } />
        <Select
          onChange={ (val) => this.selectRegion(val) }
          options={ optionsCountry } />
      </div>
    )
  }
}
