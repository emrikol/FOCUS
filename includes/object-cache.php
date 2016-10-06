<?php
/**
 * Plugin Name: FOCUS Object Cache
 * Plugin URI: https://github.com/emrikol/focus
 * Description: A File-based Object Cache that is Utterly Slow.  Persistenly caches WP_Cache objects in the file system.  Can really help speed up a site that has fast disk access and slow database access.
 * Version: 0.1
 * Text Domain: focus-cache
 * Author: Derrick Tennant
 * Author URI: https://emrikol.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package WordPress
 */

/**
 * From WordPress Core: Adds data to the cache, if the cache key doesn't already exist.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::add()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The cache key to use for retrieval later.
 * @param mixed      $data   The data to add to the cache.
 * @param string     $group  Optional. The group to add the cache to. Enables the same key
 *                           to be used across groups. Default empty.
 * @param int        $expire Optional. When the cache data should expire, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False if cache key and group already exist, true on success.
 */
function wp_cache_add( $key, $data, $group = 'default', $expire = 0 ) {
	global $wp_object_cache;
	return $wp_object_cache->add( $key, $data, $group, $expire );
}

/**
 * From WordPress Core: Closes the cache.
 *
 * This function has ceased to do anything since WordPress 2.5. The
 * functionality was removed along with the rest of the persistent cache.
 *
 * This does not mean that plugins can't implement this function when they need
 * to make sure that the cache is cleaned up after WordPress no longer needs it.
 *
 * @since 0.1.0
 *
 * @return true Always returns true.
 */
function wp_cache_close() {
	return true;
}

/**
 * From WordPress Core: Decrements numeric cache item's value.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::decr()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The cache key to decrement.
 * @param int        $offset Optional. The amount by which to decrement the item's value. Default 1.
 * @param string     $group  Optional. The group the key is in. Default empty.
 * @return false|int False on failure, the item's new value on success.
 */
function wp_cache_decr( $key, $offset = 1, $group = 'default' ) {
	global $wp_object_cache;
	return $wp_object_cache->decr( $key, $offset, $group );
}

/**
 * From WordPress Core: Removes the cache contents matching key and group.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::delete()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key   What the contents in the cache are called.
 * @param string     $group Optional. Where the cache contents are grouped. Default empty.
 * @return bool True on successful removal, false on failure.
 */
function wp_cache_delete( $key, $group = 'default' ) {
	global $wp_object_cache;
	return $wp_object_cache->delete( $key, $group );
}

/**
 * From WordPress Core: Removes all cache items.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::flush()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @return bool False on failure, true on success
 */
function wp_cache_flush() {
	global $wp_object_cache;
	return $wp_object_cache->flush();
}

/**
 * From WordPress Core: Retrieves the cache contents from the cache by key and group.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::get()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key The key under which the cache contents are stored.
 * @param string     $group Optional. Where the cache contents are grouped. Default empty.
 * @return bool|mixed False on failure to retrieve contents or the cache contents on success
 */
function wp_cache_get( $key, $group = 'default' ) {
	global $wp_object_cache;
	return $wp_object_cache->get( $key, $group );
}

/**
 * From WordPress Core: Increment numeric cache item's value
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::incr()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The key for the cache contents that should be incremented.
 * @param int        $offset Optional. The amount by which to increment the item's value. Default 1.
 * @param string     $group  Optional. The group the key is in. Default empty.
 * @return false|int False on failure, the item's new value on success.
 */
function wp_cache_incr( $key, $offset = 1, $group = 'default' ) {
	global $wp_object_cache;
	return $wp_object_cache->incr( $key, $offset, $group );
}

/**
 * From WordPress Core: Sets up Object Cache Global and assigns it.
 *
 * @since 0.1.0
 *
 * @global WP_Object_Cache $wp_object_cache
 */
function wp_cache_init() {
	global $wp_object_cache;
	$wp_object_cache = new WP_Object_Cache(); // override ok.
}

/**
 * From WordPress Core: Replaces the contents of the cache with new data.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::replace()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The key for the cache data that should be replaced.
 * @param mixed      $data   The new data to store in the cache.
 * @param string     $group  Optional. The group for the cache data that should be replaced.
 *                           Default empty.
 * @param int        $expire Optional. When to expire the cache contents, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False if original value does not exist, true if contents were replaced
 */
function wp_cache_replace( $key, $data, $group = 'default', $expire = 0 ) {
	global $wp_object_cache;
	return $wp_object_cache->replace( $key, $data, $group, $expire );
}

/**
 * From WordPress Core: Saves the data to the cache.
 *
 * Differs from wp_cache_add() and wp_cache_replace() in that it will always write data.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::set()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key    The cache key to use for retrieval later.
 * @param mixed      $data   The contents to store in the cache.
 * @param string     $group  Optional. Where to group the cache contents. Enables the same key
 *                           to be used across groups. Default empty.
 * @param int        $expire Optional. When to expire the cache contents, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False on failure, true on success
 */
function wp_cache_set( $key, $data, $group = 'default', $expire = 0 ) {
	global $wp_object_cache;
	return $wp_object_cache->set( $key, $data, $group, $expire );
}

/**
 * From WordPress Core: Switches the interal blog ID.
 *
 * This changes the blog id used to create keys in blog specific groups.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::switch_to_blog()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param int $blog_id Site ID.
 */
function wp_cache_switch_to_blog( $blog_id ) {
	global $wp_object_cache;
	return $wp_object_cache->switch_to_blog( $blog_id );
}

/**
 * From WordPress Core: Adds a group or set of groups to the list of global groups.
 *
 * @since 0.1.0
 *
 * @see WP_Object_Cache::add_global_groups()
 * @global WP_Object_Cache $wp_object_cache Object cache global instance.
 *
 * @param string|array $groups A group or an array of groups to add.
 */
function wp_cache_add_global_groups( $groups ) {
	global $wp_object_cache;
	return $wp_object_cache->add_global_groups( $groups );
}

/**
 * From WordPress Core: Adds a group or set of groups to the list of non-persistent groups.
 *
 * @since 0.1.0
 *
 * @param string|array $groups A group or an array of groups to add.
 */
function wp_cache_add_non_persistent_groups( $groups ) {
	global $wp_object_cache;
	return $wp_object_cache->add_non_persistent_groups( $groups );
}

/**
 * From WordPress Core: Core class that implements an object cache.
 *
 * The WordPress Object Cache is used to save on trips to the database. The
 * Object Cache stores all of the cache data to memory and makes the cache
 * contents available by using a key, which is used to name and later retrieve
 * the cache contents.
 *
 * This implementation of the object cache uses flat files to store objects
 * and overrides the core non-persistent cache.
 *
 * @since 0.1.0
 */
class WP_Object_Cache {
	/**
	 * The amount of times the cache data was already stored in the cache.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var int
	 */
	private $cache_hits = 0;

	/**
	 * Amount of times the cache did not have the request in cache.
	 *
	 * @since 0.1.0
	 * @access public
	 * @var int
	 */
	public $cache_misses = 0;

	/**
	 * Stores operations by group for stats
	 *
	 * @since 0.1.0
	 * @access private
	 * @var int
	 */
	private $group_ops = array();

	/**
	 * Holds the cached objects.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var array
	 */
	private $cache = array();

	/**
	 * List of global cache groups.
	 *
	 * @since 0.1.0
	 * @access protected
	 * @var array
	 */
	protected $global_groups = array();

	/**
	 * Groups that should not be stored in persistent cache.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var array
	 */
	private $non_persistent_groups = array( 'comment' );

	/**
	 * The blog prefix to prepend to keys in non-global groups.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var int
	 */
	private $blog_prefix;

	/**
	 * Holds the value of is_multisite().
	 *
	 * @since 0.1.0
	 * @access private
	 * @var bool
	 */
	private $multisite;

	/**
	 * Directory where cache files are stored.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var string
	 */
	private $cache_dir;

	/**
	 * Directory where multisite cache files are stored.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var string
	 */
	private $ms_cache_dir;

	/**
	 * Secret to use for a hash salt.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var string
	 */
	private $secret = '';

	/**
	 * Hash blog IDs.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var bool
	 */
	private $secure = true;

	/**
	 * Default maximum cache expiry.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var int
	 */
	public $default_expiration = YEAR_IN_SECONDS;

	/**
	 * Cache file header.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var string
	 */
	private $cache_serial_header = '<?php /*';

	/**
	 * Cache file footer.
	 *
	 * @since 0.1.0
	 * @access private
	 * @var string
	 */
	private $cache_serial_footer = '*/ ?>';

	/**
	 * Sets up object properties.
	 *
	 * @since 0.1.0
	 *
	 * @global int $blog_id Global blog ID.
	 */
	function __construct() {
		global $blog_id;

		$this->blog_prefix = $blog_id;
		$this->multisite = is_multisite();

		if ( defined( 'CACHE_PATH' ) ) {
			$this->cache_dir = CACHE_PATH;
		} else {
			$this->cache_dir = ABSPATH . 'wp-content' . DIRECTORY_SEPARATOR . 'object-cache' . DIRECTORY_SEPARATOR;
		}

		if ( defined( 'WP_SECRET' ) ) {
			$this->secret = WP_SECRET;
		} else {
			$this->secret = defined( 'AUTH_KEY' ) ? AUTH_KEY : '';
		}

		if ( $this->secure ) {
			$this->blog_prefix = $this->_hash( $blog_id );
		}

		$this->_mkdir( $this->cache_dir );
	}

	/**
	 * Saves the object cache before object is completely destroyed.
	 *
	 * Called upon object destruction, which should be when PHP ends.
	 *
	 * @since 0.1.8
	 *
	 * @return true Always returns true.
	 */
	public function __destruct() {
		return true;
	}

	/**
	 * Adds data to the cache if it doesn't already exist.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @uses WP_Object_Cache::_exists() Checks to see if the cache already has data.
	 * @uses WP_Object_Cache::set()     Sets the data after the checking the cache contents existence.
	 *
	 * @param int|string $key    What to call the contents in the cache.
	 * @param mixed      $data   The contents to store in the cache.
	 * @param string     $group  Optional. Where to group the cache contents. Default 'default'.
	 * @param int        $expire Optional. When to expire the cache contents. Default 0 (maximum expiration).
	 * @return bool False if cache key and group already exist, true on success
	 */
	public function add( $key, $data, $group = 'default', $expire = 0 ) {
		if ( wp_suspend_cache_addition() ) {
			return false;
		}

		$group = $this->_sanitize_cache_group( $group );

		if ( $this->_exists( $key, $group ) ) {
			return false;
		}

		if ( false !== $this->get( $key, $group ) ) {
			return false;
		}

		return $this->set( $key, $data, $group, (int) $expire );
	}

	/**
	 * Sets the list of global cache groups.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param array $groups List of groups that are global.
	 */
	public function add_global_groups( $groups ) {
		$groups = (array) $groups;

		// Add and dedupe groups.
		$this->global_groups = array_merge( $this->global_groups, $groups );
		$this->global_groups = array_unique( $this->global_groups );
	}

	/**
	 * Sets the list of non-persistent cache groups.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param array $groups List of groups that are global.
	 */
	public function add_non_persistent_groups( $groups ) {
		$groups = (array) $groups;

		// Add and dedupe groups.
		$this->non_persistent_groups = array_merge( $this->non_persistent_groups, $groups );
		$this->non_persistent_groups = array_unique( $this->non_persistent_groups );
	}

	/**
	 * Decrements numeric cache item's value.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param int|string $key    The cache key to decrement.
	 * @param int        $offset Optional. The amount by which to decrement the item's value. Default 1.
	 * @param string     $group  Optional. The group the key is in. Default 'default'.
	 * @return false|int False on failure, the item's new value on success.
	 */
	public function decr( $key, $offset = 1, $group = 'default' ) {
		$group = $this->_sanitize_cache_group( $group );

		// Key/Group doesn't exist, return false.
		if ( ! $this->_exists( $key, $group ) ) {
			return false;
		}

		// Sanitize value.
		$this->cache[ $group ][ $key ] = (int) $this->cache[ $group ][ $key ];

		// Sanitize offset.
		$offset = (int) $offset;

		// Decrement value.
		$this->cache[ $group ][ $key ] -= $offset;

		// Do not let value go negative.
		$this->cache[ $group ][ $key ] = max( 0, $this->cache[ $group ][ $key ] );

		// Save new value to the cache.
		$this->set( $key, $this->cache[ $group ][ $key ], $group, $this->_get_expiration( $key, $group ) );

		// Return new value.
		return $this->cache[ $group ][ $key ];
	}

	/**
	 * Removes the contents of the cache key in the group.
	 *
	 * If the cache key does not exist in the group, then nothing will happen.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param int|string $key        What the contents in the cache are called.
	 * @param string     $group      Optional. Where the cache contents are grouped. Default 'default'.
	 * @return bool False if the contents weren't deleted and true on success.
	 */
	public function delete( $key, $group = 'default' ) {
		$group = $this->_sanitize_cache_group( $group );
		$return = true;

		// Key/Group doesn't exist, return false.
		if ( ! $this->_exists( $key, $group ) ) {
			$return = false;
		}

		// Delete cached item and return true.
		unset( $this->cache[ $group ][ $key ] );

		// Delet the cache file.
		if ( $this->_focus_file_exists( $key, $group )  ) {
			unlink( $this->_get_focus_file( $key, $group ) ); // @codingStandardsIgnoreLine
		}

		// Stats.
		$this->group_ops[ $group ][] = 'Delete ' . $key;

		return $return;
	}

	/**
	 * Clears the object cache of all data.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @return true Always returns true.
	 */
	public function flush() {
		// Delete all data in cache directory, empty memory cache.
		$this->_rm_cache_dir( $this->cache_dir );
		$this->cache = array();
		return true;
	}

	/**
	 * Retrieves the cache contents, if it exists.
	 *
	 * The contents will be first attempted to be retrieved by searching by the
	 * key in the cache group. If the cache is hit (success) then the contents
	 * are returned.
	 *
	 * On failure, the number of cache misses will be incremented.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param int|string $key    What the contents in the cache are called.
	 * @param string     $group  Optional. Where the cache contents are grouped. Default 'default'.
	 * @return false|mixed False on failure to retrieve contents or the cache contents on success.
	 */
	public function get( $key, $group = 'default' ) {
		$group = $this->_sanitize_cache_group( $group );

		// Memory cache exists, please grab.
		if ( $this->_exists( $key, $group ) ) {
			// Stats.
			$this->group_ops[ $group ][] = 'Hit (Mem): ' . $key;
			$this->cache_hits++;

			return $this->cache[ $group ][ $key ];
		}

		// FOCUS Cache file exists, please grab.
		if ( $this->_focus_file_exists( $key, $group ) ) {
			// If the object has expired, remove it from the cache and return false to force a refresh.
			if ( $this->_get_expiration( $key, $group ) < 0 ) {
				$this->delete( $key, $group );

				// Stats.
				$this->group_ops[ $group ][] = 'Miss (Expired): ' . $this->_get_cache_dir( $group, true ) . $key;
				$this->cache_misses++;

				return false;
			}

			$this->cache[ $group ][ $key ] = maybe_unserialize( base64_decode( substr( file_get_contents( $this->_get_focus_file( $key, $group ) ), strlen( $this->cache_serial_header ), - strlen( $this->cache_serial_footer ) ) ) ); // @codingStandardsIgnoreLine

			// Stats.
			$this->group_ops[ $group ][] = 'Hit (FOCUS): ' . $this->_get_cache_dir( $group, true ) . $key;
			$this->cache_hits++;

			if ( is_object( $this->cache[ $group ][ $key ] ) ) {
				return clone $this->cache[ $group ][ $key ];
			}

			return $this->cache[ $group ][ $key ];
		}

		$this->group_ops[ $group ][] = 'Miss (Empty): ' . $this->_get_cache_dir( $group, true ) . $key;
		$this->cache_misses++;
		return false;
	}

	/**
	 * Increments numeric cache item's value.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param int|string $key    The cache key to increment.
	 * @param int        $offset Optional. The amount by which to increment the item's value. Default 1.
	 * @param string     $group  Optional. The group the key is in. Default 'default'.
	 * @return false|int False on failure, the item's new value on success.
	 */
	public function incr( $key, $offset = 1, $group = 'default' ) {
		$group = $this->_sanitize_cache_group( $group );

		// Key/Group doesn't exist, return false.
		if ( ! $this->_exists( $key, $group ) ) {
			return false;
		}

		// Sanitize value.
		$this->cache[ $group ][ $key ] = (int) $this->cache[ $group ][ $key ];

		// Sanitize offset.
		$offset = (int) $offset;

		// Increment value.
		$this->cache[ $group ][ $key ] += $offset;

		// Save new value to the cache.
		$current_expiry = $this->_get_expiration( $key, $group );
		$this->set( $key, $this->cache[ $group ][ $key ], $group, $current_expiry );

		// Return new value.
		return $this->cache[ $group ][ $key ];
	}

	/**
	 * Replaces the contents in the cache, if contents already exist.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @see WP_Object_Cache::set()
	 *
	 * @param int|string $key    What to call the contents in the cache.
	 * @param mixed      $data   The contents to store in the cache.
	 * @param string     $group  Optional. Where to group the cache contents. Default 'default'.
	 * @param int        $expire Optional. When to expire the cache contents. Default 0 (no expiration).
	 * @return bool False if not exists, true if contents were replaced.
	 */
	public function replace( $key, $data, $group = 'default', $expire = 0 ) {
		$group = $this->_sanitize_cache_group( $group );

		// Key/Group doesn't exist, return false.
		if ( ! $this->_exists( $key, $group ) ) {
			return false;
		}

		return $this->set( $key, $data, $group, (int) $expire );
	}

	/**
	 * Sets the data contents into the cache.
	 *
	 * The cache contents is grouped by the $group parameter followed by the
	 * $key. This allows for duplicate ids in unique groups. Therefore, naming of
	 * the group should be used with care and should follow normal function
	 * naming guidelines outside of core WordPress usage.
	 *
	 * The $expire parameter is not used, because the cache will automatically
	 * expire for each time a page is accessed and PHP finishes. The method is
	 * more for cache plugins which use files.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param int|string $key    What to call the contents in the cache.
	 * @param mixed      $data   The contents to store in the cache.
	 * @param string     $group  Optional. Where to group the cache contents. Default 'default'.
	 * @param int        $expire Not Used.
	 * @return true Always returns true.
	 */
	public function set( $key, $data, $group = 'default', $expire = 0 ) {
		$group = $this->_sanitize_cache_group( $group );

		if ( 0 === $expire ) {
			$expire = $this->default_expiration;
		}

		// Clone objects.
		if ( is_object( $data ) ) {
			$data = clone $data;
		}

		$this->cache[ $group ][ $key ] = $data;

		// Stats.
		$this->group_ops[ $group ][] = 'Set ' . $this->_get_cache_dir( $group, true ) . $key . ' (' . $expire . 's)';

		return $this->_save( $key, $data, $group, $expire );
	}

	/**
	 * Echoes the stats of the caching.
	 *
	 * Gives the cache hits, and cache misses. Also prints every cached group,
	 * key and the data.
	 *
	 * @since 0.1.0
	 * @access public
	 */
	public function stats() {
		?>
		<p><strong>Cache Hits:</strong> <?php echo esc_html( $this->cache_hits ); ?></p>
		<p><strong>Cache Misses:</strong> <?php echo esc_html( $this->cache_misses ); ?></p>
		<h3>Object Cache:</h3>
		<?php foreach ( $this->group_ops as $group => $ops ) : ?>
			<?php
			if ( ! isset( $_GET['debug_queries'] ) && 500 < count( $ops ) ) { // input var ok.
				$ops = array_slice( $ops, 0, 500 );
				echo "<big>Too many to show! <a href='" . esc_url( add_query_arg( 'debug_queries', 'true' ) ) . "'>Show them anyway</a>.</big>\n";
			}
			?>
			<h4><?php echo esc_html( $group ); ?> commands</h4>
			<div style="font-family: monospace;">
				<?php
				$lines = array();
				foreach ( $ops as $op ) {
					echo wp_kses_post( $this->_colorize_debug_line( $op ) . '<br/>' );
				}
				?>
			</div>
		<?php endforeach; ?>
		<?php
	}

	/**
	 * Switches the interal blog ID.
	 *
	 * This changes the blog ID used to create keys in blog specific groups.
	 *
	 * @since 0.1.0
	 * @access public
	 *
	 * @param int $blog_id Blog ID.
	 */
	public function switch_to_blog( $blog_id = false ) { // @codingStandardsIgnoreLine
		if ( false === $blog_id || (int) $blog_id < 1 ) {
			return false;
		}

		$this->blog_prefix = (int) $blog_id;

		if ( $this->secure ) {
			$this->blog_prefix = $this->_hash( $blog_id );
		}
	}

	/**
	 * Serves as a utility function to colorize cache stats.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param string $line Stats to be colorized.
	 * @return string HTML colorized stats.
	 */
	protected function _colorize_debug_line( $line ) {
		$colors = array(
			'Get' => 'green',
			'Set' => 'purple',
			'Add' => 'blue',
			'Delete' => 'red',
			'Hit' => 'orange',
			'Miss' => 'brown',
		);

		$cmd = substr( $line, 0, strpos( $line, ' ' ) );

		$cmd2 = '<span style="color:' . esc_attr( $colors[ $cmd ] ) . '">' . esc_html( $cmd ) . '</span>';

		return $cmd2 . substr( $line, strlen( $cmd ) );
	}

	/**
	 * Serves as a utility function to determine whether a key exists in the cache.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param int|string $key   Cache key to check for existence.
	 * @param string     $group Cache group for the key existence check.
	 * @return bool Whether the key exists in the cache for the given group.
	 */
	protected function _exists( $key, $group ) {
		return isset( $this->cache[ $group ] ) && ( isset( $this->cache[ $group ][ $key ] ) || array_key_exists( $key, $this->cache[ $group ] ) );
	}

	/**
	 * Serves as a utility function to determine if a cache file exists.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param int|string $key   Cache key to check for existence.
	 * @param string     $group Cache group for the key existence check.
	 * @return bool Whether the cache file key exists.
	 */
	protected function _focus_file_exists( $key, $group ) {
		return file_exists( $this->_get_focus_file( $key, $group ) );
	}

	/**
	 * Serves as a utility function to determine the cache expiration.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param int|string $key   Cache key to check.
	 * @param string     $group Cache group for the key check.
	 * @return int Seconds until the cache expires.
	 */
	protected function _get_expiration( $key, $group ) {
		if ( $this->_focus_file_exists( $key, $group ) ) {
			return ( filemtime( $this->_get_focus_file( $key, $group ) ) - time() );
		}

		return 0;
	}

	/**
	 * Serves as a utility function to determine the cache file directory.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param string $group Cache group for the key check.
	 * @param bool   $for_stats Shortens cache dir information for stats output.
	 * @return string The cache file directory.
	 */
	protected function _get_cache_dir( $group, $for_stats = false ) {
		// If multisite and group is not global, prefix the cache ID.
		if ( ! $this->multisite ) {
			$cache_dir = $this->cache_dir;
		} else {
			if ( isset( $this->global_groups[ $group ] ) ) {
				$cache_dir = $this->cache_dir . 'blog_global' . DIRECTORY_SEPARATOR;
			} else {
				$cache_dir = $this->_ms_cache_dir( $this->blog_prefix );
			}
		}

		if ( $for_stats ) {
			if ( ! $this->multisite ) {
				$cache_dir = '\\';
			} else {
				if ( isset( $this->global_groups[ $group ] ) ) {
					$cache_dir = 'Global\\';
				} else {
					global $blog_id;
					$cache_dir = 'Blog ' . $blog_id . '\\';
				}
			}
		}

		return $cache_dir;
	}

	/**
	 * Serves as a utility function to determine the cache file.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param int|string $key   Cache key to check.
	 * @param string     $group Cache group for the key check.
	 * @return string The cache file.
	 */
	protected function _get_focus_file( $key, $group ) {
		return $this->_get_cache_dir( $group ) . $group . '/' . $key . '.php';
	}

	/**
	 * Serves as a utility function to hash strings.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param string $data String to hash.
	 * @return string The hashed string.
	 */
	protected function _hash( $data ) {
		return hash_hmac( 'md5', $data, $this->secret );
	}

	/**
	 * Serves as a utility function to create cache group directories.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param string $group Cache group for directory creation.
	 * @return string The cache group directory.
	 */
	protected function _make_group_dir( $group = 'default' ) {
		$cache_dir = $this->_get_cache_dir( $group );
		$make_dir = '';

		foreach ( explode( '/', $group ) as $subdir ) {
			$make_dir .= $subdir . '/';
			$this->_mkdir( $cache_dir . $make_dir );
		}

		return $cache_dir . $group . '/';
	}

	/**
	 * Serves as a utility function to create directories.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param string $dir Directory to create.
	 */
	protected function _mkdir( $dir ) {
		// Give the new dirs the same perms as wp-content.
		$stat = stat( ABSPATH . 'wp-content' );
		$dir_perms = $stat['mode'] & 0007777; // Get the permission bits.
		$file_perms = $dir_perms & 0000666; // Remove execute bits for files.

		// Make the base cache dir.
		if ( ! file_exists( $dir ) ) {
			if ( ! mkdir( $dir ) ) { // @codingStandardsIgnoreLine
				return false;
			}
			chmod( $dir, $dir_perms ); // @codingStandardsIgnoreLine
		}

		if ( ! file_exists( $dir . 'index.php' ) ) {
			touch( $dir . 'index.php' ); // @codingStandardsIgnoreLine
			chmod( $dir . 'index.php', $file_perms ); // @codingStandardsIgnoreLine
		}
	}

	/**
	 * Serves as a utility function to create multisite cache group names.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param int $blog_id Blog ID to use.
	 * @return string The cache group.
	 */
	protected function _ms_cache_dir( $blog_id = false ) { // @codingStandardsIgnoreLine
		if ( false === $blog_id || (int) $blog_id < 1 ) {
			return $this->cache_dir;
		}
		return $this->cache_dir . 'blog_' . $this->blog_prefix . DIRECTORY_SEPARATOR;
	}

	/**
	 * Serves as a utility function to delete directories.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param string $dir Directory to delete.
	 */
	protected function _rm_cache_dir( $dir ) {
		$dir_object = opendir( $dir );

		if ( false === $dir_object ) {
			return false;
		}

		while ( false !== ( $file_object = readdir( $dir_object ) ) ) {
			if ( '.' === $file_object || '..' === $file_object ) {
				continue;
			}

			$dir_path = $dir . DIRECTORY_SEPARATOR . $file_object;

			if ( is_dir( $dir_path ) ) {
				$this->_rm_cache_dir( $dir_path );
			} else {
				unlink( $dir_path ); // @codingStandardsIgnoreLine
			}
		}

		closedir( $dir_object );
		rmdir( $dir ); // @codingStandardsIgnoreLine
	}

	/**
	 * Serves as a utility function to create multisite cache group names.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param int $group Cache group to sanitize.
	 * @return string Sanitized cache group.
	 */
	protected function _sanitize_cache_group( $group ) {
		if ( empty( $group ) ) {
			$group = 'default';
		}
		return $group;
	}

	/**
	 * Serves as a utility function to save the cache data to a file.
	 *
	 * @since 0.1.0
	 * @access protected
	 *
	 * @param int|string $key    What to call the contents in the cache.
	 * @param mixed      $data   The contents to store in the cache.
	 * @param string     $group  Optional. Where to group the cache contents. Default 'default'.
	 * @param int        $expire Cache expiration.
	 */
	protected function _save( $key, $data, $group = 'default', $expire = 0 ) {
		$cache_dir = $this->_get_cache_dir( $group );

		if ( 0 === $expire ) {
			$expire = $this->default_expiration;
		}

		// Give the new dirs the same perms as wp-content.
		$stat = stat( ABSPATH . 'wp-content' );
		$dir_perms = $stat['mode'] & 0007777; // Get the permission bits.
		$file_perms = $dir_perms & 0000666; // Remove execute bits for files.

		// Make FOCUS Cache directories and temp file.
		$this->_mkdir( $cache_dir );
		$group_dir = $this->_make_group_dir( $group, $dir_perms );
		$cache_file = $this->_get_focus_file( $key, $group );
		$temp_file = tempnam( $cache_dir, 'tmp' ); // @codingStandardsIgnoreLine

		// Serialize, Base64 Encode, and add Header/Footer.
		$serial = $this->cache_serial_header . base64_encode( maybe_serialize( $this->cache[ $group ][ $key ] ) ) . $this->cache_serial_footer;

		$fd = fopen( $temp_file, 'w' );

		fputs( $fd, $serial ); // @codingStandardsIgnoreLine
		fclose( $fd );

		if ( ! rename( $temp_file, $cache_file ) ) { // @codingStandardsIgnoreLine
			unlink( $temp_file ); // @codingStandardsIgnoreLine
		}
		chmod( $cache_file, $file_perms ); // @codingStandardsIgnoreLine

		// Set expiry.
		touch( $cache_file, time() + $expire ); // @codingStandardsIgnoreLine
	}
}
