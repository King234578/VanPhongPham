<?php

namespace App\Helpers;

class Helper
{

    public static function menu($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
              $html .= '
              <tr>
              <td style="width: 50px;">'.$menu->id.'</td>
              <td>'.$menu->name.'</td>
              <td>'.$menu->description.'</td>
              <td>'.$menu->unit_price.'</td>
              <td>'.$menu->promotion_price.'</td>
              <td ><img style="height:90px" src="/source/image/product/'.$menu->image.'"></td>
              <td>

                    <a class="btn btn-primary btn-sm" href="/admin/menu/edit/'.$menu->id.'">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a  class="btn btn-danger btn-sm" onclick="removeRow('. $menu->id .', \'/admin/menu/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
              </td>
              </tr>
              ';

              unset($menus[$key]);

              $html .= self::menu($menus, $menu->id, $char.'--');
            }

        }
        return $html;
    }
    public static function menuc($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
              $html .= '
              <tr>
              <td style="width: 50px;">'.$menu->id.'</td>
              <td>'.$menu->name.'</td>
              <td>'.$menu->gender.'</td>
              <td>'.$menu->email.'</td>
              <td>'.$menu->address.'</td>
              <td>'.$menu->phone_number.'</td>

              <td>

                    <a class="btn btn-primary btn-sm" href="/admin/menu/edit/'.$menu->id.'">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a  class="btn btn-danger btn-sm" onclick="removeRow('. $menu->id .', \'/admin/menu/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
              </td>
              </tr>
              ';

              unset($menus[$key]);

              $html .= self::menu($menus, $menu->id, $char.'--');
            }

        }
        return $html;
    }
    public static function menub($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach ($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
              $html .= '
              <tr>
              <td style="width: 50px;">'.$menu->id.'</td>
              <td>'.$menu->id.'</td>
              <td>'.$menu->id_customer.'</td>
              <td>'.$menu->date_order.'</td>
              <td>'.$menu->total.'</td>
              <td>'.$menu->payment.'</td>
              <td>'.$menu->note.'</td>

              <td>

                    <a class="btn btn-primary btn-sm" href="/admin/menu/edit/'.$menu->id.'">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a  class="btn btn-danger btn-sm" onclick="removeRow('. $menu->id .', \'/admin/menu/destroy\')">
                        <i class="fas fa-trash"></i>
                    </a>
              </td>
              </tr>
              ';

              unset($menus[$key]);

              $html .= self::menu($menus, $menu->id, $char.'--');
            }

        }
        return $html;
    }
    public static function active($active =0):string
    {
        return $active == 0 ? '<span class="btn btn-danger btn-xs">NO</span>'
                            :'<span class="btn btn-success btn-xs">YES</span>';
    }
}
