<?php 
/**
 * 
 * wcdr-common-class
 * @version 1.2.0
 * @author codecorun
 * 
 */
namespace codecorun\cdr\common;

defined( 'ABSPATH' ) or die( 'No access area' );

class codecorun_cdr_common_class
{
	/**
	 * 
	 * set_template
	 * @since 1.0
	 * @param string, array
	 * @return none
	 * 
	 */
    public function set_template($file, $params = [])
    {
        if(!$file)
			return;

		if(strpos($file,'.php') === false)
			$file = $file.'.php';

		$other = null;
		if(isset($params['other'])){
			$other = $params['other'].'/';
		}

		//get plugin folder name without manually assigning the folder name
		$plugin_folder = explode('/',CODECORUN_CDR_URL);
		$plugin_folder = array_filter($plugin_folder);

		$path = get_stylesheet_directory().'/'.end($plugin_folder).'/'.$other.'templates';		

		if(file_exists($path.'/'.$file)){
			include $path.'/'.$file;
		}else{
			if(isset($params['other'])){
				$other = $params['other'];
			}
			include CODECORUN_CDR_PATH.$other.'/templates/'.$file;
		}
    }

	/**
	 * 
	 * rules
	 * @since 1.0
	 * @param
	 * @return array
	 * 
	 */

	public static function rules()
	{
		return apply_filters(
			'wcdr-rules',
			[
				'lite_version' => [
					'date' => __('Date','codecorun-coupon-discount-rules'),
					'date-range' => __('Date Range','codecorun-coupon-discount-rules'),
					'include' => __('Include Product(s)','codecorun-coupon-discount-rules'),
					'exclude' => __('Exclude Product(s)','codecorun-coupon-discount-rules'),
					'count' => __('Number of item(s) in cart','codecorun-coupon-discount-rules'),
					'amount' => __('Total Amount','codecorun-coupon-discount-rules')
				],
				'pro_version' => [
					'include_category' => __('Include Category','codecorun-coupon-discount-rules'),
					'exclude_category' => __('Exclude Category','codecorun-coupon-discount-rules'),
					'had_purchased_product' => __('Had Purchased Item(s)','codecorun-coupon-discount-rules'),
					'previous_orders' => __('User had number of previous order(s)','codecorun-coupon-discount-rules'),
					'metas' => __('User have meta value(s)','codecorun-coupon-discount-rules'),
					'role' => __('User have role(s)','codecorun-coupon-discount-rules'),
					'url_param' => __('URL have parameter(s)','codecorun-coupon-discount-rules')
				]
			]
		);
	}


	/**
	 * 
	 * translatable_text
	 * @since 1.0
	 * @param
	 * @return array
	 * 
	 */
	public static function translatable_text()
	{
		return apply_filters(
			'wcdr-labels',[
				'date' => __('Date','codecorun-coupon-discount-rules'),
				'date_range' => __('Date Range','codecorun-coupon-discount-rules'),
				'from' => __('From','codecorun-coupon-discount-rules'),
				'to' => __('Include','codecorun-coupon-discount-rules'),
				'include' => __('Include','codecorun-coupon-discount-rules'),
				'exclude' => __('Exclude','codecorun-coupon-discount-rules'),
				'product' => __('Product','codecorun-coupon-discount-rules'),
				'select_product' => __('Select Product','codecorun-coupon-discount-rules'),
				'items_in_cart' => __('Number of item(s) in cart','codecorun-coupon-discount-rules'),
				'total_amount' => __('Total amount in the cart','codecorun-coupon-discount-rules'),
				'or' => __('Or','codecorun-coupon-discount-rules'),
				'and' => __('And','codecorun-coupon-discount-rules'),
				'condition' => __('Condition','codecorun-coupon-discount-rules'),
				'confirm_rule' => __('Are you sure you want to remove this rule?','codecorun-coupon-discount-rules'),
				'confirm_product' => __('Are you sure you want to remove this product?','codecorun-coupon-discount-rules'),
				'remove' => __('Remove','codecorun-coupon-discount-rules'),
				'less_than_equal' => __('Less than or equal','codecorun-coupon-discount-rules'),
				'greater_than_equal' => __('Greater than or equal','codecorun-coupon-discount-rules'),
				'equal' => __('Equal','codecorun-coupon-discount-rules'),
				'less_than' => __('Less than','codecorun-coupon-discount-rules'),
				'category' => __('Category', 'codecorun-coupon-discount-rules'),
				'select_category' => __('Select Category','codecorun-coupon-discount-rules'),
				'nth_order' => __('User (n)th order','codecorun-coupon-discount-rules'),
				'previous_orders' => __('Number of previous orders','codecorun-coupon-discount-rules'),
				'metas' => __('User has meta', 'codecorun-coupon-discount-rules'),
				'role' => __('User has role', 'codecorun-coupon-discount-rules'),
				'url_param' => __('URL as parameter(s)', 'codecorun-coupon-discount-rules'),
				'had_purchased' => __('Had Purchased', 'codecorun-coupon-discount-rules'),
				'items'	=> __('Item(s)','codecorun-coupon-discount-rules'),
				'select_role' => __('Select Role', 'codecorun-coupon-discount-rules'),
				'meta_key' => __('Meta Key', 'codecorun-coupon-discount-rules'),
				'meta_value' => __('Meta Value', 'codecorun-coupon-discount-rules'),
				'meta_label' => __('User have meta values', 'codecorun-coupon-discount-rules'),
				'add' => __('Add', 'codecorun-coupon-discount-rules'),
				'param_label' => __('URL have parameter(s)','codecorun-coupon-discount-rules'),
				'param_key' => __('Parameter key','codecorun-coupon-discount-rules'),
				'param_value' => __('Parameter value','codecorun-coupon-discount-rules'),
				'tooltip_date' => __('Date when the coupon can be applied', 'codecorun-coupon-discount-rules'),
				'tooltip_date_range' => __('Duration of the date when the coupon can be applied', 'codecorun-coupon-discount-rules'),
				'tooltip_include_products' => __('Coupon will apply when product(s) IN the cart', 'codecorun-coupon-discount-rules'),
				'tooltip_exclude_products' => __('Coupon will apply when product(s) NOT IN the cart', 'codecorun-coupon-discount-rules'),
				'tooltip_number_items' => __('Coupon will apply if the number is equal to number of product(s) in cart', 'codecorun-coupon-discount-rules'),
				'tooltip_total_amount' => __('Coupon will apply if the number is equal to the total amount in cart', 'codecorun-coupon-discount-rules'),
				'tooltip_include_category' => __('Coupon will apply if the product(s) inside the cart are belongs to selected categories', 'codecorun-coupon-discount-rules'),
				'tooltip_exclude_category' => __('Coupon will apply if the product(s) inside the cart are NOT belongs to selected categories', 'codecorun-coupon-discount-rules'),
				'tooltip_had_prev_orders' => __('Coupon will apply if the user had number(s) of orders', 'codecorun-coupon-discount-rules'),
				'tooltip_have_meta_value' => __('Coupon will apply if the user have the meta values', 'codecorun-coupon-discount-rules'),
				'tooltip_have_roles' => __('Coupon will apply if the user have the selected roles', 'codecorun-coupon-discount-rules'),
				'tooltip_url_have_param' => __('Coupon will apply if the URL the have parameters', 'codecorun-coupon-discount-rules'),
				'tooltip_had_purchased_items' => __('Coupon will apply if the user had purchased the selected item(s)', 'codecorun-coupon-discount-rules')
			]
		);
	}

}
?>