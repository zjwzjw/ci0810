<?php  defined('BASEPATH') OR exit('No direct script access allowed');
	class Blog_model extends CI_Model{
		public function get_article(){
			$query=$this->db->get('blog');
			return $query->result();
		} 
		
		public function get_catalog(){
			return $this->db->get('blog_catalog')->result();
			
		} 
		public function insert_catalog($catalog_name){
			$data=array(
				'catalog_name'=>$catalog_name,			
			
			);
			return $this->db->insert('blog_catalog',$data);
		}
		public function up_sel($id){
			$this->db->set('hits','hits+1',FALSE);
			$this->db->where('blogid',$id);
			$query=$this->db->update('blog');
			if($query){
				return $this->update_attr($id);
			}else{
				echo "查询失败";
			}
			
			
		}
		
		public function del_attr($id){
			$query=$this->db->delete('blog',array('blogid'=>$id));
			return $query;
		}
		public function update_attr($id){
			// echo 123;
			// die();
			$query=$this->db->get_where('blog',array('blogid'=>$id));
			return $query->row();
		}
		public function update_id($hid,$title,$con){ 
			$d=date('Y').'-'.date('m').'-'.date('d');
			$arr=array(
				'title'=>$title,
				'content'=>$con,
				'time'=>$d,
			);
			$this->db->where('blogid',$hid);
			$query=$this->db->update('blog',$arr);
			// var_dump($query);
			// die();
			return $query;
		}
		
		public function insert($title,$con,$time){
			$data=array(
			'title'=>$title,
			'content'=>$con,
			'time'=>$time,
			);
			$query=$this->db->insert('blog',$data);
			return $query;
		}
	}
	


?>