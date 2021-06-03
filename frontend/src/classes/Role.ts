import Permission from '@/classes/Permission'
import Entity from '@/interfaces/Entity'

export default class Role implements Entity{
  id: number
  name: string
  permissions: Permission[]

  constructor(id = 0, name = '', permissions = []) {
    this.id = id
    this.name = name
    this.permissions = permissions
  }
}
