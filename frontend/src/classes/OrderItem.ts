import Entity from '@/interfaces/Entity'

export default class OrderItem implements Entity{
  id: number
  title: string
  price: number
  quantity: number

  constructor(id = 0, name = '', price = 0, quantity = 0) {
    this.id = id
    this.title = name
    this.price = price
    this.quantity = quantity
  }
}
