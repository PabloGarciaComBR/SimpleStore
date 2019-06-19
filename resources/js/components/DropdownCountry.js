import React, { Component } from 'react'
import Select from 'react-select'
import api from '../services/api'
import PropTypes from 'prop-types'

export default class DropdownCountry extends Component {

  static propTypes = {
    countries: PropTypes.array,
    onChange: PropTypes.func
  }

  constructor (props) {
    super(props)
    this.state = {
      countries: [],
      onChange: props.onChange
    }
  }


  async componentDidMount() {

    const response = await api.get("region/find/country")
    this.setState({ countries: response.data })

  }

  render() {

    return (
      <Select
        onChange={this.state.onChange}
        options={this.state.countries} />
    )

  }
}
