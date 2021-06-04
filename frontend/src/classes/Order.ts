import OrderItem from '@/classes/OrderItem'
import Entity from '@/interfaces/Entity'

export default class Order implements Entity{
  id: number
  first_name: string
  last_name: string
  email: string
  total: number
  items: OrderItem[]

  constructor(
    id = 0,
    first_name = '',
    last_name = '',
    email = '',
    total = 0,
    items = []
  ) {
    this.id = id
    this.first_name = first_name
    this.last_name = last_name
    this.email = email
    this.total = total
    this.items = items
  }
}
